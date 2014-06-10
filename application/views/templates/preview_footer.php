    <?php $this->load->view('blogs/side_menu'); ?>
    </div><!-- end of 3rd row -->

    <div class="row">
        <div class="col-sm-12">
            <div class="footer well">
              Copyright &copy; 2014
              <?php
                if($this->session->userdata('user_id'))
                {
                  echo anchor('users/logout', '<span class="glyphicon glyphicon-eject"></span>');
                }
                else
                {
                  echo anchor('users/login', '<span class="glyphicon glyphicon-lock"></span>');
                }
              ?>
            </div>
        </div>
    </div>
</div><!-- container -->
</body>
</html>
