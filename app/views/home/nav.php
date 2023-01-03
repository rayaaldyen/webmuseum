<nav class="navbar navbar-expand-lg navbar-dark p-4 style">
<style>
        ul {
        list-style-type: none;
        margin: 0;
        padding: 0;}
        li {
        display: inline;
        }
        a {
        color: green;
        text-align: center;
        padding: 15px 18px;
        text-decoration: none;
        font-size: 17px;}
        body {
        margin: 0;
        }
        .navlist{
        color: gainsboro;
        text-align: center;
        padding: 15px 18px;
        text-decoration: none;
        font-size: 17px;}
        .activenav{
        color: orange;
        text-align: center;
        padding: 15px 18px;
        text-decoration: none;
        font-size: 17px;}
    </style>
    
      <div class="container">
        <a class="navbar-brand"
          >Museum<span style="color: #ff8000">Click</span></a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-2">
        <li
        class="nav-item"
        style="font-family: Crimson Pro; font-size: 20px"
      >
        <a class="<?php if ($data['active'] == 'home') {echo "activenav"; } else {echo "navlist";}?>" aria-current="page" href="<?php echo BASEURL;?>/home">Home</a>
      </li>
      <li
        class="nav-item"
        style="font-family: Crimson Pro; font-size: 20px"
      >
        <a class="<?php if ($data['active'] == 'collection') {echo "activenav"; } else {echo "navlist";}?>" href="<?php echo BASEURL;?>/home/collection">Collection</a>
      </li>
      <li
        class="nav-item"
        style="font-family: Crimson Pro; font-size: 20px"
      >
        <a class="<?php if ($data['active'] == 'about') {echo "activenav"; } else {echo "navlist";}?>" href="<?php echo BASEURL;?>/home/about">About</a>
      </li>
          </ul>
        </div>
      </div>
    </nav>