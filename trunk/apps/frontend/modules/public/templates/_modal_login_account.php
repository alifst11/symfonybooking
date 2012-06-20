<?php use_helper('I18N') ?>

<div class="modal hide" id="myModal">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Your account</h3>
      </div>
      
      <div class="modal-body">
        
        <p>
          You have to login or create account to continiue.
           If you have account please log in or connect via Facebook. 
        </p>

          <form action="<?php echo url_for('@sf_guard_signin') . '?cb=' . $callback ?>" method="post" class="well">
            <table>
              <tbody>
                <?php echo $form ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="2">
                    <br>
                    <input type="submit" class="btn btn-primary" value="<?php echo __('Signin', null, 'sf_guard') ?>" />
                  </td>
                </tr>
              </tfoot>
            </table>
          </form>
<div class="fb-login-button" data-show-faces="true" data-width="200" data-max-rows="1"></div>
      </div>


      <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Cancel</a>
      </div>

</div>

    <script type="text/javascript">
      $('#myModal').modal('show');
      $("#ajxloader").hide();
    </script>