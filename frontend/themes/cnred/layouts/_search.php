<form id="form-search-term">
    <div class="search-by-category">
        <div class="search-inner">
            <input type="text" placeholder="ค้นหากิจกรรมการบรรยาย" id="text-search-term"/>
            <button type="submit">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
</form>

<?php richardfan\widget\JSRegister::begin(); ?>
<script>
 
    
    $('#form-search-term').on('submit', function(){
        let search = $('#text-search-term').val();
        let url = '<?= yii\helpers\Url::to(['/site/event'])?>';
        location.href = `${url}?search=${search}`;
        return false;
    });
</script>
<?php richardfan\widget\JSRegister::end(); ?>
<?php \appxq\sdii\widgets\CSSRegister::begin() ?>
<style>
    .ui-widget.ui-widget-content {
        border: 1px solid #990000;
        z-index: 9999;
    }
    .ui-menu .ui-menu-item {
        background: #fff; 

    }
    .searchFilter .btn-secondary {
        color: #373a3c;
        background-color: #fff;
        border: 1px solid #ccc;
    }
    .searchFilter .btn-secondary:hover {
        color: #373a3c;
        background-color: #e6e6e6;
        border-color: #adadad;
    }
    .searchFilter .btn-search {
        background-color: #00aced;
        color: #fff;
        border: 1px solid #00aced;
    }
    .searchFilter .btn-search:hover {
        background-color: #b20a11;
        color: #fff;
        border: 1px solid #b20a11;
    }
    .searchFilter .label-icon {
        display: none;  
    }
    .searchFilter .glyphicon {
        margin-right: -15px;
    }
    .searchFilter .dropdown-menu .category_filters {
        min-width: 178px;
        width: 100%;
        margin: 15px 0 0 -45px;
    }
    .searchFilter .dropdown-menu-right {
        right: 170px;
        min-width: 175px;
        top: 90%;
    }
    .searchFilter .dropdown-menu .category_filters li {
        list-style-type: none;
        padding: 2px 25px;
        font-size: 18px;
    }
    .searchFilter .dropdown-menu .category_filters label {
        color: #fff;
        margin-left: 35px;
        font-size: 16pt;
    }
    .ui-menu .ui-menu-item-wrapper:hover{
        color:#fff;
    }

</style>
<?php \appxq\sdii\widgets\CSSRegister::end(); ?>