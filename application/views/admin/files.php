<?php
if (isset($files) && count($files))
{
    ?>
        <ul>
            <?php
            foreach ($files as $file)
            {
                ?>
                <li class="image_wrap">
                   
                    <strong><?php echo $file->title?></strong>
                    <br />
                    <img width="100%" src="files/<?php echo $file->filename?>">
                </li>
                <?php
            }
            ?>
        </ul>
    </form>
    <?php
}
else
{
    ?>
    <p>No Files Uploaded</p>
    <?php
}
?>