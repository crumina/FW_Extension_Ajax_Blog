<?php
$total   = $query->max_num_pages;
$current = $page ? $page : 1;

$links = paginate_links( array(
    'base'      => '%_%',
    'format'    => '?page=%#%',
    'total'     => $total,
    'current'   => $current,
    'prev_text' => __( 'Previous' ),
    'next_text' => __( 'Next' ),
    'type'      => 'array',
) );

if ( !$links ) {
    return '';
}
?>

<ul class="pagination justify-content-center">
    <?php
    foreach ( $links as $link ) {
        $classes = preg_match( '/span/', $link ) ? 'page-item disabled' : 'page-item';
        $item    = str_replace( array( '<span', '</span>', 'page-numbers', 'current', 'href=\'\'', 'href=""' ), array( '<a href="#" ', '</a>', 'page-link', 'active', 'href="?page=1"', 'href="?page=1"' ), $link );
        ?>
        <li class="<?php echo $classes; ?>"><?php echo $item; ?></li>
        <?php
    }
    ?>
</ul>
