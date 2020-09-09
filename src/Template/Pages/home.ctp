                <h2>Request information</h2>
                <p>Page view count:
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
							phpinfo();
                        } catch (Exception $e) {
                            $hasDB=0;
                        }
                    }
                ?>
                <?php if ($hasDB==1) : ?>
                   <span class="code" id="count-value"><?php print_r($result2['c']); ?></span>
				   <span class="code" id="count-value"><?php print_r($result2['21']); ?></span>
				   <span class="code" id="count-value"><?php print_r($result1['name']); ?></span>
                   </p>
                <?php else : ?>
                   <span class="code" id="count-value">No database configured</span>
                   </p>
                <?php endif; ?>

          </section>
        </div>
