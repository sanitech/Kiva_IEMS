
<div class="row" style="margin-top: 10px;">
                <div class="col-lg-6">
                  <div class="demo-inline-spacing">
                    <!-- Basic Pagination -->
                    <nav aria-label="Page navigation">
                      <ul class="pagination">
                        <?php
                        $sql_total = "SELECT COUNT(*) AS total FROM $tableName";
                        $total_stmt = $db->query($sql_total);
                        $total_rows = $total_stmt->fetchColumn();
                        $total_pages = ceil($total_rows / $results_per_page);

                        echo "<div class='pagination'>";

                        // Previous page link
                        if ($page > 1) {
                          echo "<a href='?page=" . ($page - 1) . "' class='btn btn-outline-warning d-flex align-items-center'>Previous</a>";
                        }

                        // First page link
                        if ($page > 5) {
                          echo "<a href='?page=1' class='btn btn-outline-warning d-flex align-items-center'>First</a>";
                          echo "<span>...</span>";
                        }

                        // Page links around the current page
                        $start_page = max(1, $page - 2);
                        $end_page = min($total_pages, $page + 2);

                        for ($i = $start_page; $i <= $end_page; $i++) { ?>
                          <li class='page-item p-2 border border-warning'
                              <?php if ($page == $i) echo 'style="background-color: yellow"'; ?> >
                            <a class='<?php if ($page == $i) echo 'text-black'; else echo 'text-warning'; ?>'href='?page= <?php echo $i ?> '><?php echo $i ?></a>
                         </li>
                         
                        <?php
                        }
                        // Last page link
                        if ($page < $total_pages - 4) {
                          echo "<span>...</span>";
                          echo "<a href='?page=" . $total_pages . "' class='btn btn-outline-warning d-flex align-items-center' >Last</a>";
                        }

                        // Next page link
                        if ($page < $total_pages) {
                          echo "<a href='?page=" . ($page + 1) . "' class='btn btn-outline-warning d-flex align-items-center'>Next</a>";
                        }

                        echo "</div>";
                        ?>


                      </ul>
                    </nav>
                    <!--/ Basic Pagination -->
                  </div>
                </div>
              </div>