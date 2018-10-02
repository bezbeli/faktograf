<?php

$total_args = [
    'post_status'    => 'publish',
    'post_type'      => 'post',
    'cat'            => '236', // obećanja ID
    'posts_per_page' => '-1',
];

$score = new wp_query($total_args);

$scores = [];
while ($score->have_posts()) {
    $score->the_post();

    $ratingField = get_field_object('obecanja');
    $ratingValue = get_field('obecanja');
    $ratingLabel = $ratingField['choices'][ $ratingValue ];

    $scores[] = $ratingLabel;
}

$count_scores = array_count_values($scores);

$scores_ordered = [
    // 'Nije ocijenjeno'      => $count_scores['Nije ocijenjeno'],
    'Prekršeno'            => $count_scores['Prekršeno'],
    'Započeto'             => $count_scores['Započeto'],
    'Djelomično ispunjeno' => $count_scores['Djelomično ispunjeno'],
    'Ispunjeno'            => $count_scores['Ispunjeno'],
];
?>

<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
jQuery(document).ready(function($) {
    (function($) {
        var myChart = Highcharts.chart('graf', {
            plotOptions: {
                series: {
                    colorByPoint: true
                }
            },
            chart: {
                type: 'bar',
                margin: [0,0,20,0]
            },
            title: {
                text: ''
            },
            colors: [
                '#F00',
                '#F90',
                '#CC0',
                '#693',
            ],
            xAxis: {
                categories: <?php echo json_encode(array_keys($scores_ordered)) ?>,
                labels: {
                    align:'left',
                    x:10,
                    style: {
                        fontSize: '10px',
                        color:'#fff',
                        borderColor: '#000',
                        borderWidth: '1',
                    }
                }
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            series: [{
                showInLegend: false,
                name: 'Obećanja',
                style:{
                    align: 'right',
                },
                data: <?php echo json_encode(array_values($scores_ordered)) ?>,
                dataLabels: {
                    enabled: true,
                    color: '#FFFFFF',
                    align: 'right',
                    y: 0,
                    x: -5,
                    style: {
                        fontSize: '12px'
                    }
                }
            }],
            credits: false,
        });
    })(jQuery);
});
</script>

<div class="grafikon" id="graf" style="width:100%; height:250px; margin-bottom:2em; border-right:1px solid #DDD"></div>
