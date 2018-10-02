<?php
function ft_is_sort(array $a) {
	$b = array_values($a);
	sort($b);
	return ($b === $a);
}
?>