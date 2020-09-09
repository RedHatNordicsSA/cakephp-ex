                <h2>Request information</h2>
                <p>Database information extracted:
               <?php
                    use Cake\Datasource\ConnectionManager;

                    $hasDB=1;
                    $tableExisted=0;
                    try {
                      $connection = ConnectionManager::get('default');
                    } catch(Exception $e) {
                      $hasDB=0;
                    }
                    if ($hasDB) {
                        try {
							$result1=$connection->execute('select * from redhat')->fetch('assoc');;
                            $result2=$connection->execute('select * from view_counter')->fetch('assoc');;
                        } catch (Exception $e) {
                            $hasDB=0;
                        }
                    }
                ?>
                <?php if ($hasDB==1) : ?>
                   View counter: <span class="code" id="count-value"><?php print_r($result2['c']); ?></span><br>
				   Host type: <span class="code" id="count-value"><?php print_r($result2['hostname']); ?></span><br>
				   Custom table: <span class="code" id="count-value"><?php print_r($result1['name']); ?></span><br>
                   </p>
                <?php phpinfo(); ?>
                <?php else : ?>
                   <span class="code" id="count-value">No database configured</span>
                   </p>
                <?php endif; ?>

          </section>
        </div>
