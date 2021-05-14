             <span id="page-head"><b><a class="black-text" href="/CMS/single/<?php echo $id;?>"><?php echo $tit;?></a></b></span>
                 <span class="grey-text" id="sub-text"><?php echo $sub;?></span> 
                    <hr class="line">
                    <p><h5 class="light-blue-text text-accent-4">By 
                    <a href="/CMS/authorPost.php?author=<?php echo $author ?> & p_id=<?php echo $id ?>"> <?php echo $author;?></a></h5></p>
                    <p><h6>for <span class="light-blue-text text-accent-4" ><?php echo $tag?></span></h6></p>

                    <span >Posted on:  <?php echo date('d-m-Y  || h:i:a', strtotime ($date));?></span>
                    <hr class="line">

                    <div>
                        <img class="materialboxed" data-caption="<?php  echo $tit; ?>" src="/CMS/imgs_upload/<?php echo $img;?>" alt="html-image" id="img">
                    <hr class="line">

                    <p class="text-justify">    <?php echo $con?>

                    </p> 
                    <br>

                    <a href="/CMS/single/<?php echo $id;?>" id="abc" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">library_books</i>
                        Read more</a>

                    </div> 

                    <br><br><br> <br>


