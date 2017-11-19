<?php

function draw_weather_panel() {

	echo '<div id="weather">';
    echo '<div id="today">';
    echo '<div id="temp"></div>';
    echo '<div id="icon"></div>';
    echo '<div id="city"></div>';
    echo '</div>';
	echo '<div id="week">';
    echo '<div id="weekdays"></div>';
    echo '<div class="icons"></div>';
    echo '<div id="forecast"></div>';
    echo '</div>';
	echo '</div>';

}

?>