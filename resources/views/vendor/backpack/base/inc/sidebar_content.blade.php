<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li class="header">Quản lý sản phẩm</li>
<li><a href='{{ backpack_url('product') }}'><i class='fa fa-product-hunt'></i> <span>Sản phẩm</span></a></li>
<li><a href='{{ backpack_url('image') }}'><i class='fa fa-image'></i> <span>Ảnh</span></a></li>
<li><a href='{{ backpack_url('slide') }}'><i class='fa fa-slideshare'></i> <span>Slide ảnh</span></a></li>
@hasrole('mod')
<li><a href='{{ backpack_url('category') }}'><i class='fa fa-list-alt'></i> <span>Danh mục</span></a></li>
<li><a href='{{ backpack_url('category_image') }}'><i class='fa fa-image'></i> <span>Ảnh danh mục</span></a></li>
@endrole
@hasrole('admin')
<li><a href='{{ backpack_url('category') }}'><i class='fa fa-list-alt'></i> <span>Danh mục</span></a></li>
<li><a href='{{ backpack_url('category_image') }}'><i class='fa fa-image'></i> <span>Ảnh danh mục</span></a></li>
@endrole
@hasrole('admin')
<li class="header">Quản lý công ty</li>
<li><a href='{{ backpack_url('company') }}'><i class='fa fa-building'></i> <span>Thông tin</span></a></li>
<li><a href='{{ backpack_url('social') }}'><i class='fa fa-users'></i> <span>Mạng xã hội</span></a></li>
<li><a href='{{ backpack_url('user') }}'><i class='fa fa-user'></i> <span>Nhân viên</span></a></li>
<li><a href='{{ backpack_url('top_product') }}'><i class='fa fa-product-hunt'></i> <span>Sản phẩm hàng đầu</span></a></li>
@endrole
<li class="header">Quản lý hệ thống</li>
<li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>Quản lý File</span></a></li>
<li class="header">Khách hàng</li>
<li><a href='{{ backpack_url('message') }}'><i class='fa fa-envelope-open-o'></i> <span>Lời nhắn</span></a></li>