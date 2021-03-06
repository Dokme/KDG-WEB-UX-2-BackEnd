<?php
	class Percent {
		public $relative;
		public $hundred;
		public $nominal;

		public function __construct($new, $unit) {
			$this->relative = $new/$unit;
			$this->hundred = $this->relative * 100;

			$this->formatNumber($this->relative);
			$this->formatNumber($this->hundred);

			if($this->relative > 1){
				$this->nominal = 'positive';
			} elseif($this->relative == 1){
				$this->nominal = 'status-quo';
			} elseif($this->relative < 1){
				$this->nominal = 'negative';
			}
		}	

		public function formatNumber($number) {
			return floatval(number_format($number, 2, '.', ' '));
        }
	}
?>