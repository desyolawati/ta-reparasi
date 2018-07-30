
 <?php
include ('act/viewdata.php');
  ?>
<ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="?page=profil"><img src="../assets/img/3.png" class="img-circle" width="100"></a></p>
                  <h5 class="centered"><p><?php echo $_SESSION['username']; ?></p></h5>
                  
					<li class="mt">
                      <a href="../")">
                          <i class="fa fa-book"></i>
                          <span>User Access</span>
                      </a>
                  </li>
	                   <li class="sub-menu">
                      <a href="?page=content">
                          <i class="fa fa-tasks"></i>
                          <span>Info Data</span>
                      </a>
                  </li> 
                  <li class="sub-menu">
                      <a href="?page=listdata2">
                          <i class="fa fa-tasks"></i>
                          <span>List Data</span>
                      </a>
                  </li>  
                    <li class="sub-menu">
                      <a href="?page=edit&toko_id=<?php echo $toko_id ?>">
                          <i class="fa fa-tasks"></i>
                          <span>Edit Informasi</span>
                      </a>
                  </li>    
                    <li class="sub-menu">
                      <a href="?page=formlay&toko_id=<?php echo $toko_id ?>">
                          <i class="fa fa-tasks"></i>
                          <span>Edit Layanan</span>
                      </a>
                  </li>   
                    <li class="sub-menu">
                      <a href="?page=formprod&toko_id=<?php echo $toko_id ?>">
                          <i class="fa fa-tasks"></i>
                          <span>Edit Produk</span>
                      </a>
                  </li> 
                    <li class="sub-menu">
                      <a href="?page=formmer&toko_id=<?php echo $toko_id ?>">
                          <i class="fa fa-tasks"></i>
                          <span>Edit Merek</span>
                      </a>
                  </li>     
				
              </ul>