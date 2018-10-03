<div id="currentevents">
	<?php include_once "content/news.html"; ?>
	<br/>
	<?php include_once "content/upcoming_events.html"; ?>
<!--		<?php
				use BurkardBinary\Library\Calendar\v1_0_0 as BBS_Calendar;
				$calendar = BBS_Calendar\CalendarFactory::CreateCalendar('Gigs');
				$events = $calendar->GetNextEvents(3,new DateTime());
				foreach ($events as $event) {
					print('<tr class="news">');
					print('<td class="news">');
					print('<b>'.$event->getTitle().'</b><br/>');
					$diff = date_diff($event->getStart(),$event->getEnd());
					switch ($diff) {
						case $diff->d + $diff->m + $diff->y > 0:
							print('When: '.$event->getStart()->format("l, M jS, g:ia").' to '.$event->getEnd()->format("l, M jS, g:ia").'<br/>');
							break;
						case $diff->h + $diff->i + $diff->s > 0:
							print('When: '.$event->getStart()->format("l, M jS, g:ia").' to '.$event->getEnd()->format("g:ia").'<br/>');
							break;
						default:
							print('When: '.$event->getStart()->format("l, M jS, g:ia").'<br/>');
							break;
					}
					print('Where: '.$event->getLocation().'<br/>');
					print('</td>');
					print('</tr>');
				}
		?>-->
</div>