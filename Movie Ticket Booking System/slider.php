<?php
 include 'connect.php';
 $query = " SELECT `Movie Name`,`Movie Image`,`Movie Category` FROM `movieinfo`";
 $result = mysqli_query($conn,$query);

 while($row=mysqli_fetch_assoc($result))
    {
        $MovieName = $row['Movie Name'];
        $movieImg = $row['Movie Image'];
        $movieCategory = $row['Movie Category'];
?>

<div class="slick-multiItemSlider">
<div class="movie-item">
    <div class="mv-img">
        <a href="#"><img src="<?php echo $movieImg; ?>" alt="" width="300" height="437"></a>
    </div>
    <div class="title-in">
        <div class="cate">
            <span class="blue"><a href="#">
                    <?php echo $movieCategory; ?>
                </a></span>
        </div>
        <h6><a href="#">
                <?php echo $MovieName; ?>
            </a></h6>

    </div>
    <?php } ?>
</div>
</div>