<?php
class Paging {
	function paginate($totalrows, $numperpage, $currentpage, $path) {		
		$links = "";		
		if($totalrows>$numperpage) {
		if(!is_numeric($totalrows) || !is_numeric($numperpage) || !is_numeric($currentpage)) {			
			return $links;
		}
		
		if(ceil($totalrows/$numperpage) <= 5) {			
			for($i = 1; $i <= ceil($totalrows/$numperpage); $i++) {			
				if($i == $currentpage) {					
					$links .= ' <li class="currentpage">'.$i.'</li> ';
				} else {					
					$links .= ' <li><a href="'.site_url().$path.'/page/'.$i.'">'.$i.'</a></li> ';
				}
			}
		} else {		
			if(($currentpage - 2) < 1) {				
				for($i = 1; $i <= 5; $i++) {				
					if($i == $currentpage) {						
						$links .= ' <li class="currentpage">'.$i.'</li> ';
					} else {						
						$links .= ' <li><a href="'.site_url().$path.'/page/'.$i.'">'.$i.'</a></li> ';
					}
				}
			} elseif(($currentpage + 2) > ceil($totalrows/$numperpage)) {				
				for($i = (ceil($totalrows/$numperpage) - 4); $i <= ceil($totalrows/$numperpage); $i++) {				
					if($i == $currentpage) {						
						$links .= ' <li class="currentpage">'.$i.'</li> ';
					} else {						
						$links .= ' <li><a href="'.site_url().$path.'/page/'.$i.'">'.$i.'</a></li> ';
					}
				}
			} else {
				for($i = ($currentpage - 2); $i <= ($currentpage + 2); $i++) {		
					if($i == $currentpage) {						
						$links .= ' <li class="currentpage">'.$i.'</li> ';
					} else {						
						$links .= ' <li><a href="'.site_url().$path.'/page/'.$i.'">'.$i.'</a></li> ';
					}
				}	
			}
		}
		
		if($currentpage != 1) {
			if($totalrows>$numperpage) {
				$links = ' <li><a href="'.site_url().$path.'/page/'.($currentpage - 1).'">&lt;</a></li> ' . $links;
				$links = ' <li><a href="'.site_url().$path.'/page/1">&lt;&lt;</a></li> ' . $links;
			}
		} else {
			if($totalrows>$numperpage) {
				$links = ' <li class="disablepage">&lt;</li> ' . $links;
				$links = ' <li class="disablepage">&lt;&lt;</li> ' . $links;
			}
		}
		
		if($currentpage != ceil($totalrows/$numperpage)) {
			if($totalrows>$numperpage) {
				$links .= ' <li><a href="'.site_url().$path.'/page/'.($currentpage + 1).'">&gt;</a></li> ';
				$links .= ' <li><a href="'.site_url().$path.'/page/'.ceil($totalrows/$numperpage).'">&gt;&gt;</a></li> ';
			}
		} else {
			if($totalrows>$numperpage) {			
				$links .= ' <li class="disablepage">&gt;</li> ';
				$links .= ' <li class="disablepage">&gt;&gt;</li> ';
			}
		}
				
		$header="<div class=\"pagination\"><ul>";
		$links =$header.$links; 
		$links .= '</ul></div>';
		}	
		return $links; 		
		//<div align=center><span style="font-size:10px;padding-left:100px;">Page '.$currentpage.' of '.ceil($totalrows/$numperpage).'</span></div>
	}
}

/*
<li class="disablepage">« previous</li>
<li class="currentpage">1</li>
<li><a href="http://skeletorscorpse.com/joomla/#">2</a></li>
<li><a href="http://skeletorscorpse.com/joomla/#">3</a></li>
<li><a href="http://skeletorscorpse.com/joomla/#">4</a></li>
<li><a href="http://skeletorscorpse.com/joomla/#">5</a>...</li>
<li><a href="http://skeletorscorpse.com/joomla/#">9</a></li>
<li><a href="http://skeletorscorpse.com/joomla/#">10</a></li>
<li class="nextpage"><a href="http://skeletorscorpse.com/joomla/#">next »</a></li>
</ul>
</div>
*/