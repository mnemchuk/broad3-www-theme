<div class="boardmember">
    <div class="photo"><?php print theme('imagecache', 'board_profile', $field_photo[0]['filepath']); ?></div>
    <div class="info">
        <div class="board_name"><?php print $field_first_name[0]['safe'] .' '. $field_last_name[0]['safe']; ?></div>
        <div class="board_title"><?php print $field_professional_title[0]['safe']; ?></div>
        <a href="<?php print $node_url; ?>">See <?php print $field_first_name[0]['safe'] .' '. $field_last_name[0]['safe']; ?>'s Bio</a>
    </div>
</div>