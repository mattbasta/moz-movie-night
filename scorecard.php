<?php
require_once("include.php");
function subval_sort($a,$subkey) {
	foreach($a as $k=>$v) {
		$b[$k] = strtolower($v[$subkey]);
	}
	asort($b);
	foreach($b as $key=>$val) {
		$c[] = $a[$key];
	}
	return $c;
}

if($cookie) {

?>

<table>
		<?php
		$movie_table = $db->get_table("movies");
		$vote_table = $db->get_table("votes");
		
		// Fetch a list of all of the movies.
		$movie_list = $movie_table->fetch(true, FETCH_TOKENS);
		$movie_scores = array();
		if($movie_list != false) {
			foreach($movie_list as $movie) {
				$scores = $vote_table->fetch(
					array(
						'movie'=>$movie->id
					), FETCH_ARRAY
				);
				$score = 0;
				if($scores !== false) {
					foreach($scores as $vote) {
						$score += (int) $vote["value"];
					}
				}
				$movie_scores[] = array(
					'id'=>$movie->id,
					'name'=>$movie->name,
					'score'=>$score,
					'voted'=>$vote_table->fetch(array(
						'movie'=>$movie->id,
						'voter'=>$cookie['uid']
					), FETCH_SINGLE_TOKEN)
				);
			}
			$movie_scores = array_reverse(subval_sort($movie_scores, 'score'));
			foreach($movie_scores as $score) {
				?>
				<tr>
					<td><?php echo htmlentities($score['name']); ?></td>
					<td><?php echo $score['score']; ?></td>
					<td>
						<?php
						if($score["voted"] == false || (int)$score["voted"]->value != -1) {
							?><a href="add_vote.php?movie=<?php echo $score['id']; ?>&amp;down">Vote Down</a><?php
						} else {
							echo "Your Vote";
						}
						?>
					</td>
					<td>
						<?php
						if($score["voted"] == false || (int)$score["voted"]->value != 1) {
							?><a href="add_vote.php?movie=<?php echo $score['id']; ?>&amp;up">Vote Up</a><?php
						} else {
							echo "Your Vote";
						}
						?>
					</td>
				</tr>
				<?php
			}
		}
		?>
	</table>
<?php

}