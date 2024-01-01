<div class="calendario">
    <div class="d-flex flex-wrap justify-content-center">
        <?php
        $dateComponents = getdate(strtotime('-3 hour'));
        $year = $dateComponents['year'];
        $meses = array(
            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        );
        $feriados = array();
        $feriados['2024'] = array(
            '01' => array(
                '01' => array(
                    'tipo' => 'inamovible',
                    'nombre' => 'Año nuevo'
                )
            ),
            '02' => array(
                '12' => array(
                    'tipo' => 'inamovible',
                    'nombre' => 'Carnaval'
                ),
                '13' => array(
                    'tipo' => 'inamovible',
                    'nombre' => 'Carnaval'
                ),
            ),
            '03' => array(
                '24' => array(
                    'tipo' => 'inamovible',
                    'nombre' => 'Día Nacional de la Memoria por la Verdad y la Justicia'
                ),
                '29' => array(
                    'tipo' => 'inamovible',
                    'nombre' => 'Viernes Santo'
                ),
            ),
            '04' => array(
                '01' => array(
                    'tipo' => 'puente',
                    'nombre' => 'Feriado Puente Turístico'
                ),
                '02' => array(
                    'tipo' => 'inamovible',
                    'nombre' => 'Día del Veterano y de los Caídos en la Guerra de Malvinas'
                )
            ),
            '05' => array(
                '01' => array(
                    'tipo' => 'inamovible',
                    'nombre' => 'Día del Trabajador'
                ),
                '25' => array(
                    'tipo' => 'inamovible',
                    'nombre' => 'Día de la Revolución de Mayo'
                )
            ),
            '06' => array(
                '17' => array(
                    'tipo' => 'movible',
                    'nombre' => 'Paso a la Inmortalidad del Gral. Don Martín Miguel de Güemes'
                ),
                '20' => array(
                    'tipo' => 'inamovible',
                    'nombre' => 'Paso a la Inmortalidad del General Manuel Belgrano'
                ),
                '21' => array(
                    'tipo' => 'puente',
                    'nombre' => 'Feriado Puente Turístico'
                )
            ),
            '07' => array(
                '09' => array(
                    'tipo' => 'inamovible',
                    'nombre' => 'Día de la Independencia'
                )
            ),
            '08' => array(
                '17' => array(
                    'tipo' => 'movible',
                    'nombre' => 'Paso a la Inmortalidad del Gral. José de San Martín (17/8)'
                )
            ),
            '10' => array(
                '10' => array(
                    'tipo' => 'puente',
                    'nombre' => 'Feriado Puente Turístico'
                ),
                '12' => array(
                    'tipo' => 'movible',
                    'nombre' => 'Día del Respeto a la Diversidad Cultural (12/10)'
                )
            ),
            '11' => array(
                '20' => array(
                    'tipo' => 'movible',
                    'nombre' => 'Día de la Soberanía Nacional (20/11)'
                )
            ),
            '12' => array(
                '08' => array(
                    'tipo' => 'inamovible',
                    'nombre' => 'Día de la Inmaculada Concepción de María'
                ),
                '25' => array(
                    'tipo' => 'inamovible',
                    'nombre' => 'Navidad'
                )
            ),
        );
        $isFuture = false;
        $nextFeriado = null;
        ?>

        <?php for ($month = 1; $month < 13; $month++) : ?>
            <?php
            $daysOfWeek = array('D', 'L', 'M', 'X', 'J', 'V', 'S');
            $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
            $numberDays = date('t', $firstDayOfMonth);
            $dateComponents = getdate($firstDayOfMonth);
            $monthName =  $meses[$dateComponents['mon'] - 1];
            $dayOfWeek = $dateComponents['wday'];    
            ?>
            <div class='calendar <?php echo $dayOfWeek ?>'>
                <h3>
                    <?php echo $monthName ?> <?php echo $year ?>
                </h3>
                <div style="height: 100%;display: flex;flex-direction: column;">
                    <div class="d-flex flex-wrap">
                    <?php foreach ($daysOfWeek as $day) : ?>
                        <span class='month-header'><?php echo $day ?></span>
                    <?php endforeach; ?>
                    <?php $currentDay = 1; ?>
                    </div>
                    <div class="flex-wrap calendario-grilla">
                    <?php $month = str_pad($month, 2, "0", STR_PAD_LEFT); ?>
                    <?php while ($currentDay <= $numberDays) : ?>
                        <?php if ($dayOfWeek == 7) :?>
                            <?php $dayOfWeek = 0; ?>
                        <?php endif; $marginLeft = ""?>
                        <?php if ($currentDay == 1): ?>
                            <?php for($d = 0; $d < $dayOfWeek; $d++) :?>
                                <span class='day'>
                                    <span class='day-date'>
                                    </span>
                                </span>
                            <?php endfor; ?>
                        <?php endif; ?>
                        <?php $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT); ?>
                        <?php $date = "$year-$month-$currentDayRel"; ?>
                        <?php $isFeriado = isset($feriados[$year][$month][$currentDayRel]) ? 'feriado' : ''; ?>
                        <?php if ($date == date("Y-m-d")) : $ii = 1; ?>
                            <span <?= $marginLeft ?> class='day today <?php echo $isFeriado ?>' rel='<?php echo $date ?>'>
                                <span class='today-date'>
                                    <?php echo $currentDay ?>
                                </span>
                            </span>
                            <?php $isFuture = true; ?>
                        <?php else : ?>
                            <?php $nextFeriado = !$nextFeriado && $isFuture && $isFeriado ? 
                                                array(
                                                    'mes' => $monthName,
                                                    'dia' => $currentDayRel,
                                                    'motivo' => $feriados[$year][$month][$currentDayRel]['nombre']
                                                ) :
                                                $nextFeriado; ?>
                            <?php if(isset($ii) && !$nextFeriado) $ii++; ?>
                            <span <?= $marginLeft ?> class='day <?php echo $isFeriado ?>' rel='<?php echo $date ?>'>
                                <span class='day-date'>
                                    <?php echo $currentDay ?>
                                </span>
                            </span>
                        <?php endif; ?>
                        <?php $currentDay++; ?>
                        <?php $dayOfWeek++; ?>
                        <?php if ($currentDay > $numberDays) : ?>
                            <?php while($currentDay < 37) :?>
                                <span class='day'>
                                    <span class='day-date'>
                                    </span>
                                </span>
                                <?php $currentDay++; ?>
                            <?php endwhile; ?>            
                        <?php endif; ?>
                    <?php endwhile; ?>
                        <?php if ($dayOfWeek != 7) : ?>
                            <?php $remainingDays = 7 - $dayOfWeek; ?>
                        <?php endif; ?>
                    </span>
                    </div>
                <?php if(isset($feriados[$year][$month])) :?>
                    <div class="feriados-container">
                        <div class="article-border"></div>
                        <?php foreach($feriados[$year][$month] as $dia_de_feriado => $feriado) : ?>
                            <p class="lista-feriado <?php echo $feriado['tipo'] ?>"><span class="fecha-feriado"><?php echo $dia_de_feriado ?></span><span class="nombre-feriado"><?php echo $feriado['nombre'] ?></span></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        <?php endfor;?>
    </div>
    <div class="next-feriado">
        <p style="font-size:30px">Faltan <?php echo $ii ?> días para el próximo feriado</p>
        <p style="font-size:20px"><?php echo $nextFeriado['dia'] ;?> de <?php echo $nextFeriado['mes'] ;?> - <?php echo $nextFeriado['motivo'] ;?></p>
    </div>
</div>
<style>
    .calendario {
        display: flex;
        flex-direction: column-reverse;
    }
    .calendar,
    .calendar table {
        flex-basis: 25%;
        display: flex;
        flex-direction: column;
        padding: 10px;
        font-family: caladea;
    }
    .calendar h3 {
        font-size: 1.25rem;
    }
    .lista-feriado {
        flex-basis: 25%;
        display: flex;
        margin: 0;
    }

    .day, .month-header {
        padding: 5px;
        width: calc(100% / 7);
        display: inline-flex;
        justify-content: center;
    }
    .day {
        width: 100%;
    }
    .calendar tr {
        text-align: center;
    }

    .calendar tbody {
        padding: 0 20px;
    }

    .day.today {
        background-color: var(--ta-socios);
    }

    .day.feriado {
        background-color: var(--ta-celeste);
    }
    .feriados-container {
        height: auto;
    }
    .calendario-grilla {
        height: auto;
        display: grid !important;
        grid-template-columns: repeat(7, 1fr);
        grid-auto-rows: 1fr;
    }
    .next-feriado {
        text-align: center;
        font-family: "Red Hat Display";
    }
    .fecha-feriado {
        border: 1px solid;
        border-color: var(--ta-socios);
        margin-right: 5px;
        margin-bottom: 5px;
        padding: 5px;
        height: fit-content;
        font-variant-numeric: tabular-nums;

    }
    .nombre-feriado {
        padding-top: 5px;
    }
    .month-header {
        border-bottom: 1px solid;
        border-color: var(--ta-celeste);
    }
</style>