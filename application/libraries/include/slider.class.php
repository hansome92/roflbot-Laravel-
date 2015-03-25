<?php

  /**
 * This file contains the Slider class file.
 *
 * @author Laurence
 * @version  01/23/2013 
 */

class Slider {

	var $mTotalNum   = 0;
	var $mTotalPos   = 0;
	var $mCurrentPos = 0;
	var $mRange = array ();
	
	var $mNextPos = 0;
	var $mPrevPos = 0;
	
	var $mItemsPP      = 0;
	var $mItemsInRange = 0;
	
	var $mStartName = '';
	
	function Slider ( $pp, $range, $current, $total, $start_name ) {

		$this->mItemsPP      = $pp;
		$this->mItemsInRange = $range;
		$this->mCurrentPos   = $current;
		$this->mTotalNum     = $total;
		$this->mStartName    = $start_name;
		
		$this->mTotalPos = ceil ( $this->mTotalNum / $this->mItemsPP );
	}

	function GetNextPos() {
		
		if ( $this->mCurrentPos < $this->mTotalPos - 1 ) {
			
			return $this->mCurrentPos + 1;
				
		} else {
			
			return FALSE;
		}
	}
	
	function GetPrevPos () {
		
		if ( $this->mCurrentPos > 0 ) {
		
			return $this->mCurrentPos - 1;
		
		} else {
			
			return FALSE;
		}
	}
	
	function GetNextUrl ( $url ) {

		if ( ( $next_pos = $this->GetNextPos() ) !== FALSE ) {

			if ( eregi ( '\?', $url ) ) {
				
				$url .= '&amp;' . $this->mStartName . '=' . $next_pos;
			} else {
				
				$url .= '?' . $this->mStartName . '=' . $next_pos;
			}
		
		} else {
			
			$url = '';
		}
		return $url; 
	}
	
	function GetPrevUrl ( $url ) {

		$oldUrl = $url;

		if ( ( $prev_pos = $this->GetPrevPos() ) !== FALSE ) {

				if ( eregi ( '\?', $url ) ) {
					
					$url .= '&amp;' . $this->mStartName . '=' . $prev_pos;					
					
				} else {
					
					$url .= '?' . $this->mStartName . '=' . $prev_pos;
				}
		
		} else {

			$url = '';
		}		
		
		if ( $prev_pos == 0)
			$url = $oldUrl;
		return $url; 
	}
	
	function GetRange () {
		
		$range_start = $this->mCurrentPos - $this->mItemsInRange;
		$range_end   = $this->mCurrentPos + $this->mItemsInRange;
		
		if ( $range_start < 0 ) {
			
			$range_start = 0;
		}
		
		if ( $range_end >= $this->mTotalPos ) {
			
			$range_end = $this->mTotalPos;
		}
		
		for ( $i=$range_start; $i<$range_end; $i++ ) {
		
			array_push ( $this->mRange, $i );
		}
	}
	
	function GetRangeUrl ( $url, $tmpl_cur, $tmpl ) {
		
		$this->GetRange();
		
		$str = '';

		if ( eregi ( '\?', $url ) ) {
				
			$pos_url = $url . '&' . $this->mStartName . '=';
		} else {
			$pos_url = $url . '?' . $this->mStartName . '=';
		}		
		
		foreach ( $this->mRange AS $pos ) {

			if ( $this->mCurrentPos == $pos ) {

				$str .= sprintf ( $tmpl_cur, $pos + 1 );				
	
			} elseif ( 0 == $pos ) {
				
				$str .= sprintf ( $tmpl, $url, $pos + 1 );				
				
			} else {
				
				$str .= sprintf ( $tmpl, $pos_url . $pos, $pos + 1 );
			}
		}
		
		if ( empty ( $str ) ) {
			
			$str = '0';
		}
		
		return $str;
	}	
}

?>