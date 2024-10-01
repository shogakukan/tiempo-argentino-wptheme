<?php

/**
*   Ver argumentos del constructor de suplementos en LR_Suplementos.php
*/

// Creacion de un nuevo suplemento
// new TA_Micrositio('test', array(
//     'title'                 => 'Test',
//     'priority'              => 2,
//     //'custom_content'       => true,
//     //'public'             => false,
// ));

// Eliminacion del suplemento (ademas de borrar el anterior new TA_Micrositio)
// add_action('init', function(){
//     TA_Micrositio::delete_suplement( 'test' );
// });

new TA_Micrositio('ambiental', array(
    'title'                 => 'Activo ambiental',
    'priority'              => 1,
    'custom_content'        => true,
    // 'public'                => false,
));

new TA_Micrositio('habitat', array(
    'title'                 => 'Hábitat & Pandemia',
    'priority'              => 2,
    'custom_content'        => true,
));

new TA_Micrositio('medios', array(
    'title'                 => 'Monitor de medios',
    'priority'              => 3,
    'custom_content'        => true,
));

new TA_Micrositio('radiografia-del-vaciamiento', array(
    'title'                 => 'Radiografías del Vaciamiento',
    'priority'              => 3,
    'custom_content'        => true,
));

new TA_Micrositio('20historias', array(
    'title'                 => '20 historias del saqueo económico',
    'priority'              => 5,
    'custom_content'        => true,
));

new TA_Micrositio('malvinas', array(
    'title'                 => 'Malvinas - 40 años',
    'priority'              => 6,
    'custom_content'        => true,
));

new TA_Micrositio('tiempo-de-viajes', array(
    'title'                 => 'Tiempo de viajes',
    'priority'              => 7,
    'custom_content'        => true,
));

new TA_Micrositio('qatar-2022', array(
    'title'                 => 'Qatar 2022',
    'priority'              => 8,
    'custom_content'        => true,
));

new TA_Micrositio('universitario', array(
    'title'                 => 'Tiempo Universitario',
    'priority'              => 9,
    'custom_content'        => true,
));

new TA_Micrositio('democracia', array(
    'title'                 => '40 años de democracia',
    'priority'              => 10,
    'custom_content'        => true,
));

new TA_Micrositio('rural', array(
    'title'                 => 'Tiempo Rural',
    'priority'              => 11,
    'custom_content'        => true,
));