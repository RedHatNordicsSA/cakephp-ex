                <h2>Database information extracted</h2>
				<br>
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
                          $connection->execute('create table view_counter (c integer)');
                        } catch (Exception $e) {
                        	$tableExisted=1;
                        }
						try {
                          $connection->execute('create table redhat (platform varchar(20))');
                        } catch (Exception $e) {
                        	$customtableExisted=1;
                        }
                        try {
                            if ($tableExisted==0) {
                            	$connection->execute('insert into view_counter values(1)');
                            } else {
                                $connection->execute('update view_counter set c=c+1');
                            }
							if ($customtableExisted=1) {
								$result1=$connection->execute('select * from redhat')->fetch('assoc');;
							}
							$result2=$connection->execute('select * from view_counter')->fetch('assoc');;
                        } catch (Exception $e) {
                            $hasDB=0;
                        }
                    }
                ?>
                <?php if ($hasDB==1) : ?>
                   View counter: <span class="code" id="count-value"><?php print_r($result2['c']); ?></span><br>
				   Platform info: <span class="code" id="count-value"><?php print_r($result1['platform']); ?></span><br>
                   </p>
				<br>
<h2> PHP info:</h2><br>
                <?php phpinfo(); ?>
                <?php else : ?>
                   <span class="code" id="count-value">No database configured</span>
                   </p>
                <?php endif; ?>

          </section>
        </div>
