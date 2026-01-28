<?php

namespace App\Console\Commands;

use App\Models\Bar;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BarsGenerateCommand extends Command
{
    protected $signature = 'bars:generate
        {--count=100 : Number of bars to generate}
        {--metal=gold : gold or silver}
        {--weight=100.000 : Weight in grams}
        {--purity= : Optional purity value}
        {--format=png : png or svg}
        {--output= : Output directory (default storage/app/qr_exports/{timestamp}/)}
        {--base-url= : Base URL for QR generation (overrides config)}';

    protected $description = 'Generate bars and QR codes with a CSV export.';

    public function handle(): int
    {
        $count = (int) $this->option('count');
        $metal = $this->option('metal');
        $weight = $this->option('weight');
        $purity = $this->option('purity');
        $format = $this->option('format');

        if (!in_array($metal, ['gold', 'silver'], true)) {
            $this->error('Invalid metal type. Use gold or silver.');
            return self::FAILURE;
        }

        if (!in_array($format, ['png', 'svg'], true)) {
            $this->error('Invalid format. Use png or svg.');
            return self::FAILURE;
        }

        if ($count < 1) {
            $this->error('Count must be at least 1.');
            return self::FAILURE;
        }

        $baseUrl = $this->option('base-url')
            ?: config('qr.base_url', config('app.url'));

        $timestamp = now()->format('Ymd_His');
        $outputOption = $this->option('output');
        $outputDir = $outputOption ?: 'qr_exports/' . $timestamp;

        $outputPath = $this->resolveOutputPath($outputDir);
        $this->ensureOutputDirectory($outputDir, $outputPath);

        $humanCodeNumbers = Bar::allocateHumanCodeNumbers($count);

        $csvPath = $outputPath . DIRECTORY_SEPARATOR . 'export.csv';
        $csvHandle = fopen($csvPath, 'w');
        fputcsv($csvHandle, ['public_id', 'qr_url', 'metal_type', 'weight', 'purity']);

        for ($i = 0; $i < $count; $i++) {
            $bar = Bar::create([
                'public_id' => (string) Str::ulid(),
                'human_code_number' => $humanCodeNumbers[$i] ?? null,
                'metal_type' => $metal,
                'weight' => $weight,
                'purity' => $purity ?: null,
                'status' => 'unsold',
            ]);

            $qrUrl = rtrim($baseUrl, '/') . '/q/' . $bar->public_id;
            $fileName = $bar->public_id . '.' . $format;
            $filePath = $outputPath . DIRECTORY_SEPARATOR . $fileName;

            QrCode::format($format)->size(300)->generate($qrUrl, $filePath);

            fputcsv($csvHandle, [
                $bar->public_id,
                $qrUrl,
                $bar->metal_type,
                $bar->weight,
                $bar->purity,
            ]);
        }

        fclose($csvHandle);

        $this->info('Generated ' . $count . ' bars.');
        $this->info('QR base URL: ' . $baseUrl);
        $this->info('Output: ' . $outputPath);

        return self::SUCCESS;
    }

    private function resolveOutputPath(string $outputDir): string
    {
        if ($this->isAbsolutePath($outputDir)) {
            return $outputDir;
        }

        if ($this->isStorageAppPath($outputDir)) {
            return base_path($outputDir);
        }

        return Storage::disk('local')->path($outputDir);
    }

    private function ensureOutputDirectory(string $outputDir, string $outputPath): void
    {
        if ($this->isAbsolutePath($outputDir)) {
            if (!is_dir($outputPath)) {
                mkdir($outputPath, 0755, true);
            }
            return;
        }

        if ($this->isStorageAppPath($outputDir)) {
            if (!is_dir($outputPath)) {
                mkdir($outputPath, 0755, true);
            }
            return;
        }

        Storage::disk('local')->makeDirectory($outputDir);
    }

    private function isAbsolutePath(string $path): bool
    {
        return str_starts_with($path, DIRECTORY_SEPARATOR) || preg_match('/^[A-Za-z]:\\\\/', $path) === 1;
    }

    private function isStorageAppPath(string $path): bool
    {
        return str_starts_with($path, 'storage/app/') || str_starts_with($path, 'storage\\app\\');
    }
}
