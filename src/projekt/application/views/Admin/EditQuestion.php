  <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-item">
                    <div class="content">
                         <h6> Adja meg a törlendő kérdés típusát!: </h6>
                        <?php echo form_open('Admin/editing'); ?>
                        <?php echo form_radio('QuestionType', 'YN', TRUE); ?>
                        <?php echo form_label('Eldöntendő kérdés');?><br>
                        <?php echo form_radio('QuestionType', 'ThreeAns', FALSE); ?>
                        <?php echo form_label('Három-választós kérdés');?><br>
                    </div>
                    <div class="answer content">
                        <?php echo form_label('A kérdés Id-ja:');?><br>             
                        <?php echo form_input('id', set_value(''));?><br>
                    </div>
                    
                    <div class="answer content">
                        <?php echo form_submit('show', 'Mutat');?>
                    </div>
                 
                </div>
            </div>                
        </div>
    </div>