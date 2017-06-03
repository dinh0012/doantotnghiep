<div class="grid-24">
    <div class="up-buttons">
        <a href="/admin/user/create" class="btn btn-primary">Add User</a>
        <a href="/admin/user/createcsv" style="float: right;" class="btn btn-primary">Export Users</a>
    </div>
    <div class="clear">&nbsp;</div>
    <div class="view-all">
        <div class="" id="users-grid-approved">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th id="users-grid-approved_c0"><a class="sort-link"
                                                       href="/admin/user/index/User_sort/email">Email</a></th>
                    <th id="users-grid-approved_c1"><a class="sort-link" href="/admin/user/index/User_sort/usertype">Membership</a>
                    </th>
                    <th id="users-grid-approved_c2"><a class="sort-link" href="/admin/user/index/User_sort/status">Status</a>
                    </th>
                    <th width="15%" id="users-grid-approved_c3">&nbsp;</th>
                </tr>
                <tr class="filters">
                    <td><input name="User[email]" id="email" type="text" maxlength="128" value="<?=isset($_GET['email'])?$_GET['email']:''?>"></td>
                    <td><input name="User[name]" id="name" type="text" maxlength="128"<?=isset($_GET['username'])?$_GET['username']:''?>></td>
                    <td><select name="User[status]" id="status">
                            <option value="all">All</option>
                            <option value="active"<?=isset($_GET['status'])&& $_GET['status']=='active'?'selected':''?>>Active</option>
                            <option value="inactive"<?=isset($_GET['status'])&& $_GET['status']=='inactive'?'selected':''?>>Inactive</option>
                        </select></td>
                    <td><button class="search btn btn-default">Search</button></td>
                </tr>
                </thead>
                <tbody>
                <?php $i = 0;
                if($model):
                foreach ($model as $user): ?>
                    <tr class="<?= $i % 2 == 0 ? 'odd' : 'even' ?>">
                        <td><?=$user->email?></td>
                        <td><?=$user->username?></td>
                        <td><?=$user->status=='active'?'Active':'Inactive'?></td>
                        <td class="button-column">
                            <a class="icon view" title="View" href="/admin/user/view/?id=<?=$user->id?>">
                            </a>
                            <a class="icon update" title="Update" href="/admin/user/update?id=<?=$user->id?>">

                            </a>
                            <a class="icon delete" title="Delete" href="/admin/user/delete/?id=<?=$user->id?>&<?=\vendor\security\Csrf::$_csrf_token_name?>=<?=\vendor\security\Csrf::_creatToken()?>">

                            </a>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
                </tbody>
            </table>
            <div class="pager">Go to page:
                <ul id="yw0" class="yiiPager">
                    <li class="first hidden"><a href="/admin/user/index">&lt;&lt; First</a></li>
                    <li class="previous hidden"><a href="/admin/user/index">&lt; Previous</a></li>
                    <li class="page selected"><a href="/admin/user/index">1</a></li>
                    <li class="page"><a href="/admin/user/index/User_page/2">2</a></li>
                    <li class="page"><a href="/admin/user/index/User_page/3">3</a></li>
                    <li class="page"><a href="/admin/user/index/User_page/4">4</a></li>
                    <li class="page"><a href="/admin/user/index/User_page/5">5</a></li>
                    <li class="page"><a href="/admin/user/index/User_page/6">6</a></li>
                    <li class="page"><a href="/admin/user/index/User_page/7">7</a></li>
                    <li class="page"><a href="/admin/user/index/User_page/8">8</a></li>
                    <li class="page"><a href="/admin/user/index/User_page/9">9</a></li>
                    <li class="page"><a href="/admin/user/index/User_page/10">10</a></li>
                    <li class="next"><a href="/admin/user/index/User_page/2">Next &gt;</a></li>
                    <li class="last"><a href="/admin/user/index/User_page/99">Last &gt;&gt;</a></li>
                </ul>
            </div>
            <div class="keys" style="display:none" title="/admin/user">
                <span>1837</span><span>1836</span><span>1835</span><span>1834</span><span>1833</span><span>1832</span><span>1831</span><span>1830</span><span>1829</span><span>1828</span><span>1827</span><span>1826</span><span>1825</span><span>1824</span><span>1823</span>
            </div>
        </div>
    </div>
</div>
<style>
    .view:before {
        content: '\f133';
    }

    .update:before {
        content: '\f2bf';
    }

    .delete:before {
        content: '\f37f';
    }

    table a.icon {
        padding-right: 5px;

    }
    table a.icon:hover {
        text-;
        text-decoration: none;
    }
</style>
<script>
    $('.search').click(function () {
        var email = $('#email').val();
        var username = $('#name').val();
        var status = $('#status').val();
        window.location="<?=baseUrlAmin()?>/user?search=true&email="+email+"&username="+username+"&status="+status;
    });
</script>