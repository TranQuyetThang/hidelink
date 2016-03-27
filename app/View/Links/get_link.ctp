<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<!--meta facebook-->
<meta name="author" content="Hlink"/>
<meta property="article:author" content="<?php echo Router::url( $this->here, true ); ?>" />
<meta property="og:site_name" content="Hlink" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo $link['Link']['title']; ?>" />
<meta property="og:url" content="<?php  echo Router::url( $this->here, true ); ?>" />
<meta property="og:description" content="<?php echo $link['Link']['description']; ?>" />
<meta property="og:image" content= "<?php echo $link['Link']['pic']; ?>" />
<link href="<?php  echo Router::url( $this->here, true ); ?>" rel="canonical" />
<title><?php echo $link['Link']['title']; ?></title>

</head>

<body>
<?php echo $link['Link']['description']; ?>
</body>

</html>