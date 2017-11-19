<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\init.php';

define('GET_MODAL_HTML_SCRIPT', '[GET_MODAL_HTML_SCRIPT]', TRUE);

if(isset($_POST['data']) || $_POST['data'] != null) {

	switch ($_POST['data'])
	{
		
		case GET_MODAL_HTML_SCRIPT:

			echo '<div class="modal" id="add-new-event-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">';
			echo '<div class="modal-dialog modal-lg">';
            echo '<div class="modal-content" id="new-event-modal-content">';


			echo '<div class="new-event-top-title">';
			echo '<div class="content">';
			echo '<div class="col-3">';
			echo '<div class="title">';
			echo '<i class="icon-dribbble-3">';
			echo '</i>';
			echo '<span>' . $_STRINGS->get_value('events.box-title');
			echo '</span>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="bottom-container">';
			echo '<div class="content">';
			echo '<div class="event-settings">';
			echo '<div class="event-picture">';
			echo '<div class="content">';
			echo '<div class="event-image">';
			echo '<div class="event-image-insert-button">';
			echo '<input style="display:none;" type="file" id="opfile">';
			echo '<div class="button" for="opfile">';
			echo '<span>' . $_STRINGS->get_value('events.btn-choose-img');
			echo '</span>';
			echo '</div>';
			echo '</div>';
			echo '<img src="https://i.imgur.com/WpnFhs2.png" alt="">';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="event-settings">';
			echo '<div class="content">';
			echo '<div class="event-name">';
			echo '<div class="content">';
			echo '<div class="col-sm-4">';
			echo '<div class="title">';
			echo '<span>' . $_STRINGS->get_value('events.ev-name');
			echo '</span>';
			echo '</div>';
			echo '</div>';
			echo '<div class="col-sm-8">';
			echo '<div class="input">';
			echo '<input type="text" name="input-event-name" id="input-event-name">';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';

			echo '<div class="event-info">';
			echo '<div class="content">';
			echo '<div class="col-sm-4">';
			echo '<div class="title">';
			echo '<span>' . $_STRINGS->get_value('events.event-info');
			echo '</span>';
			echo '</div>';
			echo '</div>';
			echo '<div class="col-sm-8">';
			echo '<div class="input">';
			echo '<textarea name="input-event-info" id="input-event-info" cols="30" rows="4">';
			echo '</textarea>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';

			echo '<div class="event-date">';
			echo '<div class="content">';
			echo '<div class="col-sm-4">';
			echo '<div class="title">';
			echo '<span>' . $_STRINGS->get_value('events.date');
			echo '</span>';
			echo '</div>';
			echo '</div>';
			echo '<div class="col-sm-8">';
			echo '<div class="input">';
			echo '<input type="date" name="input-event-date" id="input-event-date">';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';

			echo '<div class="event-start-time">';
			echo '<div class="content">';
			echo '<div class="col-sm-4">';
			echo '<div class="title">';
			echo '<span>' . $_STRINGS->get_value('events.init');
			echo '</span>';
			echo '</div>';
			echo '</div>';
			echo '<div class="col-sm-8">';
			echo '<div class="input">';
			echo '<input type="time" name="input-event-start-time" id="input-event-start-time">';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';

			echo '<div class="event-end-time">';
			echo '<div class="content">';
			echo '<div class="col-sm-4">';
			echo '<div class="title">';
			echo '<span>' . $_STRINGS->get_value('events.end');
			echo '</span>';
			echo '</div>';
			echo '</div>';
			echo '<div class="col-sm-8">';
			echo '<div class="input">';
			echo '<input type="time" name="input-event-end-time" id="input-event-end-time">';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';

			echo '<div class="event-shift">';
			echo '<div class="content">';
			echo '<div class="col-sm-4">';
			echo '<div class="title">';
			echo '<span>Turno';
			echo '</span>';
			echo '</div>';
			echo '</div>';
			echo '<div class="col-sm-8">';
			echo '<div class="input">';
			echo '<select name="input-event-shift" id="input-event-shift">';
			echo '<option value="0">' . $_STRINGS->get_value('web.manha');
			echo '</option>';
			echo '<option value="1">' . $_STRINGS->get_value('web.tarde');
			echo '</option>';
			echo '<option value="2">' . $_STRINGS->get_value('web.noite');
			echo '</option>';
			echo '</select>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';

			echo '<div class="event-local">';
			echo '<div class="content">';
			echo '<div class="col-sm-4">';
			echo '<div class="title">';
			echo '<span>Local';
			echo '</span>';
			echo '</div>';
			echo '</div>';
			echo '<div class="col-sm-8">';
			echo '<div class="input">';
			echo '<input type="text" name="input-event-local" id="input-event-local">';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';

			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="bottom-buttons">';
			echo '<div class="content">';
			echo '<div class="buttons-content">';
			echo '<div class="button" id="create-event-button">';
			echo '<span>' . $_STRINGS->get_value('events.btn-new-event');
			echo '</span>';
			echo '</div>';
			echo '<div class="ex-button" data-dismiss="modal">';
			echo '<span>' . $_STRINGS->get_value('events.exit');
			echo '</span>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';

            echo '</div>';
			echo '</div>';
			echo '</div>';

			break;

	}
 

}