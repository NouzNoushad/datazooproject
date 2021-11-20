    <footer class="d-flex justify-content-between align-items-center py-3 my-5 border-top bg-primary mb-0 ">
      <div class="col-md-4 mb-0 text-start ps-3" style="color: white">&copy; 2021 Company</div>
      <ul class="navbar-nav ms-auto pe-4">
          <li class="nav-item">
              <a href="/user" class="nav-link " style="color: white">Home</a>
          </li> 
          @if(Session::get('name'))
            <li class="nav-item">
                <a href="/create" class="nav-link " style="color: white">AddData</a>
            </li>
          @endif
      </ul>
    </footer>
    
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>