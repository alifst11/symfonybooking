
<div class="sf_admin_form">
  <?php echo form_tag_for($form, '@period') ?>
    <?php echo $form->renderHiddenFields(false) ?>

<table>
    
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
        </td>
      </tr>
    </tfoot>

    <tbody>
      
      <?php echo $form->renderGlobalErrors() ?>
      
      <tr>
        <th><?php echo $form['date_from']->renderLabel() ?></th>
        <td>
          <?php echo $form['date_from']->renderError() ?>
          <?php echo $form['date_from'] ?>
        </td>
      </tr>

      <tr>
        <th><?php echo $form['date_to']->renderLabel() ?></th>
        <td>
          <?php echo $form['date_to']->renderError() ?>
          <?php echo $form['date_to'] ?>
        </td>
      </tr>

      <tr>
        <th><?php echo $form['price']->renderLabel() ?></th>
        <td>
          <?php echo $form['price']->renderError() ?>
          <?php echo $form['price'] ?>
        </td>
      </tr>

    </tbody>

  </table>
  <input type="submit" value="Save" />
</div>