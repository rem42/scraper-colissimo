<?php

declare(strict_types=1);

namespace Scraper\ScraperColissimo\Model\Label;

/**
 * Values accepted by `outputFormat.outputPrintingType` and by the OUTPUT_PRINT_TYPE_CN23 field.
 * Formats ending with "_UL" print the label and the CN23 on the same page ("étiquette unifiée").
 */
final class OutputPrintingType
{
    public const string ZPL_10X15_203DPI = 'ZPL_10x15_203dpi';
    public const string ZPL_10X15_300DPI = 'ZPL_10x15_300dpi';
    public const string DPL_10X15_203DPI = 'DPL_10x15_203dpi';
    public const string DPL_10X15_300DPI = 'DPL_10x15_300dpi';
    public const string PDF_10X15_300DPI = 'PDF_10x15_300dpi';
    public const string PDF_A4_300DPI = 'PDF_A4_300dpi';
    public const string ZPL_10X10_203DPI = 'ZPL_10x10_203dpi';
    public const string ZPL_10X10_300DPI = 'ZPL_10x10_300dpi';
    public const string DPL_10X10_203DPI = 'DPL_10x10_203dpi';
    public const string DPL_10X10_300DPI = 'DPL_10x10_300dpi';
    public const string PDF_10X10_300DPI = 'PDF_10x10_300dpi';
    public const string ZPL_10X12_203DPI = 'ZPL_10x12_203dpi';
    public const string ZPL_10X12_300DPI = 'ZPL_10x12_300dpi';
    public const string DPL_10X12_203DPI = 'DPL_10x12_203dpi';
    public const string DPL_10X12_300DPI = 'DPL_10x12_300dpi';
    public const string PDF_10X12_300DPI = 'PDF_10x12_300dpi';
    public const string ZPL_10X15_203DPI_UL = 'ZPL_10x15_203dpi_UL';
    public const string ZPL_10X15_300DPI_UL = 'ZPL_10x15_300dpi_UL';
    public const string DPL_10X15_203DPI_UL = 'DPL_10x15_203dpi_UL';
    public const string DPL_10X15_300DPI_UL = 'DPL_10x15_300dpi_UL';
    public const string PDF_10X15_300DPI_UL = 'PDF_10x15_300dpi_UL';
    public const string PDF_A4_300DPI_UL = 'PDF_A4_300dpi_UL';
}
