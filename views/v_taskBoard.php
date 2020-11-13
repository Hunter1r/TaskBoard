

<div class="container-fluid">
    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sort by
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="../index.php?sort=user_name desc">Name increase</a>
            <a class="dropdown-item" href="../index.php?sort=user_name asc">Name decrease</a>
            <a class="dropdown-item" href="../index.php?sort=user_mail desc">E-mail increase</a>
            <a class="dropdown-item" href="../index.php?sort=user_mail asc">E-mail decrease</a>
            <a class="dropdown-item" href="../index.php?sort=ok desc">Status increase</a>
            <a class="dropdown-item" href="../index.php?sort=ok asc">Status decrease</a>
        </div>
    </div>
</div>


<div class="container-fluid">
    <h1><?=$title?></h1>

    <div class="row">
        <?php
        $items = $content['content'];
        $paramArray = $content['param'];
        $totalPages =$paramArray['totalPages'];
        $curPage = $paramArray['currentPage'];
        $isAdmin = $paramArray['isAdmin'];
        foreach ($items as $item):
        ?>
        <div class="col-sm-6">
            <div class="card border-secondary mb-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?=$item['user_name']?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?=$item['user_mail']?></h6>

                    <?php if ($isAdmin):?>
                    <form action="../index.php?pageId=<?=$curPage?>&taskId=<?=$item['task_id']?>" method="post">
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="taskDescription" rows="3"><?=$item['text']?></textarea>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-sm">Save task text</button>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" <?=$item['ok'] ? "checked" : ""?> id="<?=$item['task_id']?>">
                                        <label class="form-check-label" for="CheckDoneId_<?=$item['task_id']?>">Done</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php else:?>
                    <p class="card-text"><?=$item['text']?></p>
                    <?php endif;?>


                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <span class="badge badge-success <?=$item['ok'] ? "" : "d-none"?>">Success</span>
                            </div>
                            <div class="col">
                                <p class="card-text <?=$item['edited'] ? "" : "d-none"?>"><small class="text-muted">edited by admin</small></p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>


    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
<!--            <li class="page-item">-->
<!--                <a class="page-link" href="#" aria-label="Previous">-->
<!--                    <span aria-hidden="true">&laquo;</span>-->
<!--                    <span class="sr-only">Previous</span>-->
<!--                </a>-->
<!--            </li>-->
            <?php for ($i=1;$i<=$totalPages;$i++):?>
            <li class="page-item <?=$i==$curPage ? "active" : ""?> "><a class="page-link" href="../index.php?c=page&act=index&pageId=<?=$i?>"><?=$i?></a></li>
<!--                <li class="page-item --><?//=$i==$curPage ? "active" : ""?><!-- "><a class="page-link" href="../index.php?c=page&act=index&pageId=--><?//=$i?><!--">--><?//=$i?><!--</a></li>-->
            <?php endfor;?>

<!--            <li class="page-item">-->
<!--                <a class="page-link" href="#" aria-label="Next">-->
<!--                    <span aria-hidden="true">&raquo;</span>-->
<!--                    <span class="sr-only">Next</span>-->
<!--                </a>-->
<!--            </li>-->
        </ul>
    </nav>



</div>
