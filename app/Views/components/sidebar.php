<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?php echo (uri_string() == '') ? "" : "collapsed" ?>" href="/">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link <?php echo (uri_string() == 'transaction') ? "" : "collapsed" ?>" href="/transaction">
          <i class="bi bi-cart-check"></i>
          <span>Cart</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <?php
      if (session()->get('role') == 'admin') {
      ?>
          <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'product') ? "" : "collapsed" ?>" href="/product">
              <i class="bi bi-receipt"></i>
              <span>Product</span>
            </a>
          </li>
      <?php
      }
      ?>
      </ul>

  </aside><!-- End Sidebar-->
