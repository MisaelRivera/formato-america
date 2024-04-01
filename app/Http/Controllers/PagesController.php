<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Helpers\PdfHelper;

class PagesController extends Controller
{
    //
    public $emptyCheckbox = __DIR__ . '/../../Helpers/img/empty_checkbox.png';
    public $checkedCheckbox = __DIR__ . '/../../Helpers/img/checked_checkbox.png';

    public function index ()
    {
        return Inertia::render('Index', ['title' => 'Hello, this is working!']);
    }

    public function generatePdf ()
    {
        $pdf = new PdfHelper('P', 'cm', 'Letter');
        $pdf->SetLeftMargin(1);
        $pdf->SetRightMargin(0.8);
        $pdf->SetTopMargin(1.1);
        $pdf->AddPage();
        $pdf->SetFont('Arial','B', 9);
        $pdf->CellTextWidth(0.53, 'Folio:');
        $pdf->SetFont('Arial','', 9);
        $pdf->Line($pdf->GetX(), $pdf->getUnderlineCoor(0.53), $pdf->GetX() + 6.32 - $pdf->prevTextLen, $pdf->getUnderlineCoor(0.53));
        $pdf->Cell(6.32 - $pdf->GetStringWidth('Folio:') - 0.08, 0.53, ' MFQ-');
        $pdf->SetFillColor(184, 184, 184);
        $pdf->utfCell(5.12, 0.53, 'Caracteristicas de la muestra:', 0, 0, 'R');
        $pdf->SetXY(1, $pdf->GetY() + 0.53);
        $pdf->SetFont('Arial','', 8);
        $pdf->MultiCell(4.02, 0.345, utf8_decode('Fecha reposo de muestra (Etapa 1 Sedimentación)'), 1, 'C', true);
        $pdf->SetXY($pdf->GetX() + 4.02, $pdf->GetY() - 0.69);
        $pdf->utfCell(2.30, 0.69, 'mL', 1, 0, 'C', true);
        $pdf->utfCell(1.22, 0.69, '24 h', 1, 0, 'C', true);
        $pdf->utfCell(1.22, 0.69, '3 h', 1, 0, 'C', true);
        $pdf->utfCell(2.68, 0.69, 'muestras vigentes', 1, 0, 'C', true);
        $pdf->MultiCell(5.38, 0.57, utf8_decode('Muestras preservadas correctamente a 4±2°C refrigerador núm. 93'), 1, 'C', true);
        $pdf->SetXY($pdf->GetX() + 16.82, $pdf->GetY() - 1.14);
        $pdf->utfCell(1.27, 0.69, 'Si', 1, 0, 'C', true);
        $pdf->utfCell(1.38, 0.69, 'No', 1, 0, 'C', true);
        $pdf->SetXY(1, $pdf->GetY() + 0.69);
        $pdf->utfCell(4.02, 0.45, '2023-12-11', 1, 0, 'C');
        $pdf->utfCell(2.30, 0.45, '5000 aprox', 1, 0, 'C');
        $pdf->Image($this->emptyCheckbox, $pdf->GetX() + 0.5, $pdf->GetY() + 0.08, 0.3, 0.3);
        $pdf->utfCell(1.22, 0.45, '', 1);
        $pdf->Image($this->emptyCheckbox, $pdf->GetX() + 0.5, $pdf->GetY() + 0.08, 0.3, 0.3);
        $pdf->utfCell(1.22, 0.45, '', 1);
        $pdf->utfCell(1.38, 0.45, 'Si', 1);
        $pdf->Image($this->emptyCheckbox, $pdf->GetX() - 0.7, $pdf->GetY() + 0.08, 0.3, 0.3);
        $pdf->utfCell(1.30, 0.45, 'No', 1);
        $pdf->Image($this->emptyCheckbox, $pdf->GetX() - 0.7, $pdf->GetY() + 0.08, 0.3, 0.3);
        $pdf->moveRight(5.38);
        $pdf->Image($this->emptyCheckbox, $pdf->GetX() + 0.5, $pdf->GetY() + 0.08, 0.3, 0.3);
        $pdf->utfCell(1.27, 0.45, '', 1);
        $pdf->Image($this->emptyCheckbox, $pdf->GetX() + 0.5, $pdf->GetY() + 0.08, 0.3, 0.3);
        $pdf->utfCell(1.38, 0.45, '', 1);
        $pdf->SetXY(1, $pdf->GetY() + 0.45);
        $pdf->SetFont('Arial','', 9);
        $pdf->utfCell(4.02, 0.37, 'Reactivos utilizados', 1, 0, 'C', true);
        $pdf->utfCell(2.30, 0.37, 'Cuaderno', 1, 0, 'C', true);
        $pdf->utfCell(1.22, 0.37, 'Pág.', 1, 0, 'C', true);
        $pdf->utfCell(10.55, 0.37, 'Material utilizado', 1, 0, 'C', true);
        $pdf->utfCell(1.38, 0.37, 'Equipo', 1, 0, 'C', true);
        $pdf->SetXY(1, $pdf->GetY() + 0.37);
        $pdf->utfCell(4.02, 0.40, 'ZnSO4·7H2O p= 1.3  g/mL', 1);
        $pdf->utfCell(2.30, 0.40, '79-1', 1, 0, 'C');
        $pdf->utfCell(1.22, 0.40, '67-A(2)', 1);
        $pdf->utfCell(5.73, 0.40, 'Tubos de centrifuga de 50 mL', 1);
        $pdf->utfCell(4.82, 0.40, 'Cubreobjetos', 1);
        $pdf->utfCell(1.38, 0.40, '', 1, 0, '', true);
        $pdf->SetXY(1, $pdf->GetY() + 0.40);
        $pdf->utfCell(4.02, 0.37, 'Alcohol - Acido', 1, 0, 'C', true);
        $pdf->utfCell(2.30, 0.37, '79-1', 1, 0, 'C');
        $pdf->utfCell(1.22, 0.37, '20-B(2)', 1, 0, 'C');
        $pdf->utfCell(5.73, 0.37, 'Recipiente de plástico de 2 L', 1);
        $pdf->utfCell(4.82, 0.37, 'Aplicadores de madera', 1);
        $pdf->utfCell(1.38, 0.37, '', 1, 0, '', true);
        $pdf->SetXY(1, $pdf->GetY() + 0.37);
        $pdf->utfCell(4.02, 0.74, 'Acetato de etilo', 1, 0, 'C', true);
        $pdf->utfCell(3.52, 0.37, 'Marca: J.T. Baker', 1);
        $pdf->utfCell(5.73, 0.37, 'Pipetas Pasteur', 1);
        $pdf->utfCell(4.82, 0.37, 'Tamiz de 150 - 170 μm', 1);
        $pdf->utfCell(1.38, 0.37, '143', 1);
        $pdf->SetXY(5.02, $pdf->GetY() + 0.37);
        $pdf->utfCell(3.52, 0.37, 'Lote: Y39C87', 1);
        $pdf->utfCell(5.73, 0.37, 'Pipeta graduada de 10 mL', 1);
        $pdf->utfCell(4.82, 0.37, 'Densímetro', 1);
        $pdf->utfCell(1.38, 0.37, '142', 1);
        $pdf->SetXY(1, $pdf->GetY() + 0.37);
        $pdf->utfCell(7.54, 0.34, 'Agua bidestilada garrafon Núm. 9', 1, 0, 'C');
        $pdf->utfCell(5.73, 0.34, 'Probeta de 100 mL / 1000 mL', 1);
        $pdf->utfCell(4.82, 0.34, 'Cámara de Neubauer o Raffer', 1);
        $pdf->utfCell(1.38, 0.34, '141-5', 1);
        $pdf->SetXY(1, $pdf->GetY() + 0.34);
        $pdf->utfCell(1.98, 0.37, 'Fecha:', 1, 0, 'R');
        $pdf->utfCell(2.04, 0.37, '', 1);
        $pdf->utfCell(2.30, 0.37, 'Cuad. 44-4', 1);
        $pdf->utfCell(3.82, 0.37, 'Fecha Etapa 2 Filtración:', 1, 0, 'C', true);
        $pdf->utfCell(3.13, 0.37, '2023-12-12', 1, 0, 'C');
        $pdf->utfCell(3.55, 0.37, 'Fecha Etapa 3 Flotación:', 1, 0, 'C', true);
        $pdf->utfCell(2.65, 0.37, '2023-12-13', 1, 0, 'C');
        $pdf->SetXY(1, $pdf->GetY() + 0.37);
        $pdf->utfCell(4.02, 0.42, 'Centrifuga Núm. 192', 1, 0, 'C', true);
        $pdf->utfCell(4.74, 0.42, 'Etapa 3 aprox. 1700 y 2600 rpm', 1);
        $pdf->utfCell(5.65, 0.42, 'Etapa 4 aprox. 1700 y 2100 rpm', 1, 0, 'C');
        $pdf->utfCell(5.06, 0.42, 'Centrifugación de 3 a 5 min.', 1, 0, 'C', true);
        $pdf->SetXY(1, $pdf->GetY() + 0.42);
        $pdf->utfCell(7.54, 0.45, 'Observación en microscopio, equipo núm. 255', 1, 0, 'C');
        $pdf->SetXY(7.32, $pdf->GetY() + 0.45);
        $pdf->utfCell(6.95, 0.53, 'Etapa 4 Cuantificación:', 0, 0, 'R');
        $pdf->utfCell(3.55, 0.53, '2023-12-14', 1, 0, 'C');
        $pdf->SetXY(7.32, $pdf->GetY() + 0.53);
        $pdf->utfCell(3.82, 0.53, 'Total de huevos contados:', 0);
        $pdf->utfCell(1.3, 0.53, 10, 0);
        $pdf->moveRight(1.83);
        $pdf->utfCell(6.2, 0.53, 'H= Número de huevos contados.', 0);
        $pdf->SetXY($pdf->GetX() - 6.2, $pdf->GetY() + 0.53);
        $pdf->utfCell(6.2, 0.53, 'HL= Número de huevos por litro.', 0);
        $pdf->SetXY(7.32, $pdf->GetY() + 0.53);
        $pdf->utfCell(2.44, 0.53, 'HL=H/5', 0);
        $pdf->utfCell(1.38, 0.53, 'HL=', 0);
        $pdf->utfCell(1.30, 0.53, 2, 0);
        $pdf->moveRight(1.83);
        $pdf->utfCell(6.2, 0.53, '5= Volumen de la muestra.', 0);
        $pdf->SetXY(7.32, $pdf->GetY() + 0.79);
        $pdf->SetFont('Arial','B', 8);
        $pdf->utfCell(3.82, 0.74, 'RESULTADO:', 0, 0, 'R');
        $pdf->utfCell(1.30, 0.74, '<1', 0, 0, 'C');
        $pdf->utfCell(1.83, 0.74, 'H/L', 0);
        $pdf->SetFont('Arial','', 8);
        $pdf->SetXY(7.32, $pdf->GetY() + 0.74);
        $pdf->utfCell(13.15, 0.53, 'En el caso de que el resultado de la fórmula anterior sea menor de 1, se debe reportar 1 H/L.');
        $pdf->SetXY($pdf->GetX() - 13.15, $pdf->GetY() + 0.53);
        $pdf->utfCell(13.15, 0.53, 'En caso de que existan fracciones mayores a H/L se deberá redondear al entero inmediato superior.');
        $pdf->SetXY($pdf->GetX() - 13.15, $pdf->GetY() + 0.53);
        $pdf->utfCell(10.5, 0.53, 'Se realizaron todas las Etapas del analisis indicadas en la pág. 1 y 2 de este libro.');
        $pdf->utfCell(1.27, 0.53, 'Si');
        $pdf->Image($this->emptyCheckbox, $pdf->GetX() - 0.7, $pdf->GetY() + 0.08, 0.3, 0.3);
        $pdf->utfCell(1.38, 0.53, 'No');
        $pdf->Image($this->emptyCheckbox, $pdf->GetX() - 0.7, $pdf->GetY() + 0.08, 0.3, 0.3);
        $pdf->SetXY(1, $pdf->GetY() + 1.06);
        $pdf->Output('I', 'test.php', true);
        exit;
    }
}
