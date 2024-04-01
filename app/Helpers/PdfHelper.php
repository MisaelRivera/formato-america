<?php

namespace App\Helpers;

use Codedge\Fpdf\Fpdf\Fpdf;

class PdfHelper extends FPDF
{
    public $logoPath = __DIR__ . '/img/logo.png';
    public $prevTextLen = 0;


    public function getLineLen()
    {
        return $this->GetPageWidth() - $this->lMargin - $this->rMargin;
    }

    public function convertPointsToCm ($points) {
        return $points * 0.0352777;
    }

    public function getUnderlineCoor ($height)
    {
        $pY = ($height - $this->FontSize) / 2;
        return $this->GetY() + $height - $pY;
    }

    public function moveDown ($distance)
    {
        $this->SetY($this->GetY() + $distance);
    }

    public function moveUp ($distance)
    {
        $this->SetY($this->GetY() - $distance);
    }

    public function moveRight ($distance)
    {
        $this->SetX($this->GetX() + $distance);
    }

    public function moveLeft ($distance)
    {
        $this->SetX($this->GetX() - $distance);
    }

    public function SetRelX ($length)
    {
        $x = $this->GetX();
        $this->SetX($x + $length);
    }

    public function SetRelY ($length)
    {
        $y = $this->GetY();
        $this->SetY($y + $length);
    }

    public function SetRelXY ($lengthX, $lengthY)
    {
        $x = $this->GetX();
        $y = $this->GetY();
        $this->SetX($x + $lengthX, $y + $lengthY);
    }

    public function utfCell ($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '')
    {
        $this->Cell($w, $h, utf8_decode($txt), $border, $ln, $align, $fill, $link);
        $this->prevTextLen = $this->GetStringWidth(utf8_decode($txt));
    }

    public function CellTextWidth ($h = 0, $txt, $border = 0, $ln = 0, $align = '', $fill = false, $link = '')
    {
        $w = $this->GetStringWidth($txt);
        $this->Cell($w, $h, utf8_decode($txt), $border, $ln, $align, $fill, $link);
        $this->prevTextLen = $this->GetStringWidth(utf8_decode($txt));
    }

    public function countingPrevCell ($w, $h = 0, $txt, $border = 0, $ln = 0, $align = '', $fill = false, $link = '')
    {
        $this->Cell($w - $this->prevTextLen, $h, utf8_decode($txt), $border, $ln, $align, $fill, $link);
        $this->prevTextLen = $this->GetStringWidth(utf8_decode($txt));
    }

    function Header()
    {
        $this->SetFont('Arial', '', 11);
        $this->SetX(1);
        $this->Image($this->logoPath, 1.75, 1, 0.8125, 0.8125);
        $this->utfCell($this->getLineLen(), 0.4, 'LABORATORIO DE ANÁLISIS INDUSTRIALES DEL GUADIANA, S.A. DE C.V.', 0, 0, 'C');
        $this->SetRelY(0.4);
        $this->SetFontSize(8);
        $this->utfCell($this->getLineLen(), 0.4, 'Determinación: Huevos de helminto Norma mexicana NMX-AA-113-SCFI-2012 y PA-31', 0, 0, 'C');
        $this->SetRelY(-0.4);
        $this->SetX(1);
        $this->SetRelX($this->getLineLen() - 2.125);
        $this->SetFontSize(9);
        $this->CellTextWidth(0.4, 'PC-07/R27');
        $this->SetRelY(0.8);
    }
}