<div id="main_section"><!--start Main Section-->
        <?php

		$query=mysql_query("SELECT * FROM course ");
		
		
		?>
        <h1>Insert Book</h1>
        <form action="<?php echo INC.'controller.php?action=insert_book'; ?>" method="post">
        <table>
        	<tr> 
            	<td>Course Title</td>
            	<td>
            		<select name="course">
                    <?php
						while($row=mysql_fetch_array($query))
						{
					?>
					 <option value="<?php echo $row['Course_id']; ?>"> <?php echo $row['Course_name']; ?></option>
                     <?php
						}
					 ?>
                    </select>
            	</td>
            </tr>
            
            <tr>
            	<td>
                	Book Title
                </td>
                <td>
                	<input type="text" name="book_title">
                </td>
            </tr>
            <tr>
            	<td colspan="2">
                <input type="submit" value="Insert_book">
                </td>
            </tr>
        </table>
        </form>
        </div><!--End Main Section-->
        <div style="clear:both">
        </div>
    </div><!--End Container-->