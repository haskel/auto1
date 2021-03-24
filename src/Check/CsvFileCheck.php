<?php

namespace App\Check;

use Laminas\Diagnostics\Check\AbstractFileCheck;
use Laminas\Diagnostics\Result\Failure;
use Laminas\Diagnostics\Result\ResultInterface;
use Laminas\Diagnostics\Result\Success;

/**
 * Health check for LiipMonitorBundle
 * @see https://github.com/liip/LiipMonitorBundle
 *
 * Checks if
 * - The file is readable
 * - The file has header and at least one data row
 * - Number of cells in the header and in the row are equal
 */
class CsvFileCheck extends AbstractFileCheck
{
    private const DELIMITER = ",";

    /**
     * @param string $file
     * @return ResultInterface
     */
    protected function validateFile($file)
    {
        if (($handle = fopen($file, 'rb')) === false) {
            return new Failure(sprintf('Could not open CSV file "%s"', $file));
        }

        $header = fgetcsv($handle, 0, self::DELIMITER);
        if (!$header) {
            return new Failure(sprintf('CSV file "%s" does not have a header', $file));
        }

        $firstRow = fgetcsv($handle, 0, self::DELIMITER);
        if (!$firstRow) {
            return new Failure(sprintf('CSV file "%s" is empty', $file));
        }

        fclose($handle);

        if (count($header) !== count($firstRow)) {
            return new Failure(
                sprintf('CSV file "%s" is incorrect. Number of cells in the header and in the row are equal.', $file)
            );
        }

        return new Success();
    }
}
