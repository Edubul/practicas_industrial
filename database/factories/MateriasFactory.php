<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MateriasFactory extends Factory
{
    private $materias = [
        'Fundamentos de Investigación',
        'Taller de Ética',
        'Cálculo Diferencial',
        'Taller de Herramientas Intelectuales',
        'Química',
        'Dibujo Industrial',
        'Electricidad y Electrónica Industrial',
        'Propiedades de los Materiales',
        'Cálculo Integral',
        'Probabilidad y Estadística',
        'Análisis de la Realidad Nacional',
        'Taller de Liderazgo',
        'Metrología y Normalización',
        'Álgebra Lineal',
        'Cálculo Vectorial',
        'Economía',
        'Estadística Inferencial I',
        'Estudio del Trabajo I',
        'Procesos de Fabricación',
        'Física',
        'Algoritmos y Lenguajes de Programación',
        'Investigación de Operaciones I',
        'Estadística Inferencial II',
        'Estudio del Trabajo II',
        'Higiene y Seguridad Industrial',
        'Administración de Proyectos',
        'Gestión de Costos',
        'Administración de las Operaciones I',
        'Investigación de Operaciones II',
        'Control Estadístico de la Calidad',
        'Ergonomía',
        'Desarrollo Sustentable',
        'Taller de Investigación I',
        'Ingeniería Económica',
        'Administración de las Operaciones II',
        'Simulación',
        'Administración del Mantenimiento',
        'Mercadotecnia',
        'Taller de Investigación II',
        'Planeación Financiera',
        'Planeación y Diseño de Instalaciones',
        'Sistemas de Manufactura',
        'Logística y Cadenas de Suministro',
        'Gestión de los Sistemas de Calidad',
        'Ingeniería de Sistemas',
        'Formulación y Evaluación de Proyectos',
        'Relaciones Industriales',
        'Plan de Negocios',
        'Sistemas de Manufactura II',
        'Planeación Avanzada de la Calidad',
        'Ingeniería de la Calidad',
        'Mantenimiento Productivo Total',
        'Innovación',
        'Planificación de Recursos Empresariales',
        'Modelo de Negocios',
        'Sistemas de Manufactura Avanzada',
        'Sistemas Integrales',
        'Ingeniería de la Calidad y Toma de Decisiones',
        'Mantenimiento Productivo Total',
        'Liderazgo',
        'Ergonomía Aplicada'

    ];

    private $claves_materias = [
        'ACC-0906',
        'ACA-0907',
        'ACF-0901',
        'INH-1029',
        'INC-1025',
        'INN-1008',
        'INC-1009',
        'INC-1024',
        'ACF-0902',
        'AEC-1053',
        'INQ-1006',
        'INC-1030',
        'AEC-1048',
        'ACF-0903',
        'ACF-0904',
        'AEC-1018',
        'AEF-1024',
        'INJ-1011',
        'INC-1023',
        'INC-1013',
        'INC-1005',
        'INC-1018',
        'AEF-1025',
        'INJ-1012',
        'INF-1016',
        'INR-1003',
        'AEC-1392*',
        'INC-1001',
        'INC-1019',
        'INF-1007',
        'INF-1010',
        'ACD-0908',
        'ACA-0909',
        'AEC-1037',
        'INC-1002',
        'INC-1027',
        'INC-1004',
        'AED-1044',
        'ACA-0910',
        'INC-1021',
        'INC-1022',
        'INF-1028',
        'INH-1020',
        'INC-1015',
        'INR-1017',
        'AED-1030',
        'INC-1026',
        'CPC1303',
        'CPD1304',
        'CPC1305',
        'CPC1306',
        'CPD1307',
        'CPC1301',
        'GPD1302',
        'SIC1801',
        'SID1803',
        'SIF1804',
        'SII1805',
        'SIF1806',
        'SIC1807',
        'SIH1802'
    ];
    private static $i = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        self::$i++;
        return [
            'clave' => $this->claves_materias[self::$i],
            'nombre' => $this->materias[self::$i],
        ];
    }
}
