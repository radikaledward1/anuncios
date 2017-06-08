
    <?php if(session('userinfo')): ?>

    <nav>
      <div class="nav-wrapper">
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
          <a href="<?php echo url('/');; ?>"><li><img src="images/home.png" alt=""></li></a>
        </ul>
        <ul class="right hide-on-med-and-down">
          <li><a href="login">Iniciar session</a></li>
          <li><a href="registro">Registrate</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="<?php echo url('/');; ?>">Inicio</a></li>
          <li><a href="login">Iniciar session</a></li>
          <li><a href="registro">Registrate</a></li>
        </ul>
      </div>
    </nav>

    <?php else: ?>

    <nav>
      <div class="nav-wrapper">
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
          <a href="<?php echo url('/');; ?>"><li><img src="images/home.png" alt=""></li></a>
        </ul>
        <ul class="right hide-on-med-and-down">
          <li><a href="login">Iniciar session</a></li>
          <li><a href="registro">Registrate</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="<?php echo url('/');; ?>">Inicio</a></li>
          <li><a href="login">Iniciar session</a></li>
          <li><a href="registro">Registrate</a></li>
        </ul>
      </div>
    </nav>

    <?php endif; ?>