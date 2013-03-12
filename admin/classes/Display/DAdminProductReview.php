<?php
/**
* GNU General Public License.

* This file is part of ZeusCart V4.

* ZeusCart V4 is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 4 of the License, or
* (at your option) any later version.
* 
* ZeusCart V4 is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with Foobar. If not, see <http://www.gnu.org/licenses/>.
*
*/


/**
 * This class contains functions to show the product review details.
 *
 * @package  		Display_DAdminProductReview
 * @category  		Display
 * @author    		AjSquareInc Dev Team
 * @link   		http://www.zeuscart.com
   * @copyright 		Copyright (c) 2008 - 2013, AjSquare, Inc.
 * @version  		Version 4.0
 */

class Display_DAdminProductReview
{
	
	/**
	 * Stores the array
	 *
	 * @var array 
	 */	
	 $arr = array();
	/**
	 * Stores the value
	 *
	 * @var array 
	 */	
	$val = array();
	/**
	 * Stores the output
	 *
	 * @var array 
	 */	
	$output = array();
	/**
	 * List out the review details. 
	 * @param array $arr
	 * @param integer $flag
	 * @return string
	 */
	function showReviewDetails($arr,$flag)
	{
		$output ='<form name="review" action="?do=adminproductreview&action=search" method="post">';
		$output .= '<table width="100%" border="0" cellpadding="0" cellspacing="0" class="content_list_bdr">
             
              <tr>
                <td colspan="9" class="cnt_list_bot_bdr"><img src="images/list_bdr.gif" alt="" width="1" height="2" /></td>
              </tr>';
		 $output.=' <tr>
                <td  class="content_list_head">S.No</td>
                <td class="content_list_head">User Name</td>
				<td class="content_list_head">Product Name</td>
				<td class="content_list_head">Review Summary</td>
				<td class="content_list_head">Review</td>
				<td class="content_list_head">Posted On</td>
				<td class="content_list_head">Status</td>
                
                </tr>
				 <tr >
                <td colspan="8" class="cnt_list_bot_bdr"><img src="images/list_bdr.gif" alt="" width="1" height="2" /></td>
              </tr>';
		$output .= '<tr><td class="content_list_txt1"><b>Search</b></td><td class="content_list_txt1"><input type="text" size="30"  style="width:75px;" name="username" id="username" value="'.$_POST['username'].'"/></td><td class="content_list_txt1"><input type="text" name="title" id="title" size="30"  style="width:75px;" value="'.$_POST['title'].'"/></td><td class="content_list_txt1"><input type="text" name="reviewtxt" size="30"  style="width:75px;" value="'.$_POST['reviewtxt'].'"/></td><td class="content_list_txt1"><input type="text" size="30"  style="width:75px;" name="review" value="'.$_POST['review'].'"/></td><td class="content_list_txt1"><input type="text" id="cal-field-1" name="date" size="30"  style="width:75px;" value="'.$_POST['date'].'"/><input type="image" src="images/calendar_img.gif" id="cal-button-1" value="cal">
		 <script type="text/javascript">
            Calendar.setup({
              inputField    : "cal-field-1",
              button        : "cal-button-1",
              align         : "Tr"
            });
          </script></td><td class="content_list_txt1"><input class="all_bttn" type="submit" name="search" value="Search"/></td></tr>';
		 
		
		$cnt = count($arr);
		if($flag=='1')
			$output .= '<tr><td align="center" colspan="7"><font color="orange"><b>No Record Found</b></font></td></tr>';
		else
		{
			for ($i=0;$i<$cnt;$i++)
			{
				$reviewdatetime=$arr[$i]['review_date'];
				$review_date_time = explode(" ",$reviewdatetime);
				$review_date = explode("-",$review_date_time[0]);
				$review_time = explode(":",$review_date_time[1]);
				$reviewdate=date("M d, Y ",mktime(0,0,0,$review_date[1],$review_date[2],$review_date[0]));
				if($i % 2 == 0)
				$classtd='class="content_list_txt1"';
			else
				$classtd='class="content_list_txt2"';
				
				$output .='<tr style="background-color:#FFFFFF;" onmouseout="listbg(this, 0);" onmouseover="listbg(this, 1);"><td '.$classtd.'>'.($i+1).'</td><td '.$classtd.'>'.$arr[$i]['user_display_name'].'</td><td '.$classtd.'><a href="?do=aprodetail&action=showprod&prodid='.$arr[$i]['product_id'].'">'.$arr[$i]['title'].'</a></td>';
				$output .='<td '.$classtd.'>'.$arr[$i]['review_txt'].'</td><td '.$classtd.'>'.$arr[$i]['review_caption'].'</td><td '.$classtd.'>'.$reviewdate. '</td>';
				
				
				if($arr[$i]['review_status']==0)
				{
					
					$output .='<td '.$classtd.'><a href="?do=adminproductreview&action=accept&prodid='.$arr[$i]['product_id'].'&usrid='.$arr[$i]['user_id'].'" class="inactive_link" title="Click to Activate">Inactive</a>&nbsp;&nbsp</td>';
				}
				else
				{
					$output .='<td '.$classtd.'><a href="?do=adminproductreview&action=deny&prodid='.$arr[$i]['product_id'].'&usrid='.$arr[$i]['user_id'].'"class="active_link" title="Click to Inactivate">Active</a></td>';
				}
				
				
				
				$output.='<input type="hidden" name="prodid" value="'.$arr[$i]['product_id'].'"/>';
			}
		}
		$output .='<tr><td colspan="8" align="right" '.$classtd.'><b>Export Report</b>&nbsp;&nbsp;<select name="export">
						<option value="">Select Format</option>
						<option value="excel">Excel</option>
						<option value="xml">XML</option>
						<option value="csv">CSV</option>
						<option value="tab">TAB</option>
		   			</select>&nbsp;&nbsp;&nbsp;<input type="submit" name="btnreport" value="Export"></td></tr>';
		$output.='</table></form>';
		return $output;
	}
	
}
?>
