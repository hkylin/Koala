<div class="ST-feed">
  <div class="feed-wrap">
  {foreach from=$post item=item key=key }
    <div class="card card-wrap" {if $item.isMe === true}data-st="{$item['post_id']}"{/if}>
      <div class="avatar pull-left">
        <a href="/detail/{$item['user_info']['user_id']}"><img src="{$item['user_info']['avatar']}" title="{$item['user_info']['user_nickname']}"></a>
      </div>
      <div class="ST-detail">
        <div class="ST-info">
          <a href="/detail/{$item['user_info']['user_id']}" class="ST-txt fz-14 fw-b">{$item['user_info']['user_nickname']}</a>
        </div>
        <div class="ST-txt" data-type="ST-message">
          {$item['post']}
        </div>
        <div class="ST-media-box">
          <ul class="ST-media">
            {foreach from=$item.media item=media key=m_key}
              <li class="ST-pic s-img">
                <img action-type="pic_to_bg" class="bg-cursor" src="{$media}" alt="{$item['post']}" />
              </li>
            {/foreach}
          </ul>
        </div>
        <div class="ST-expend-media-box"></div>
      </div>
      <div class="post-datetime">
        <span>{$item['post_date']}</span>
      </div>
      {if $item.isMe === true}
      <div class="post-opration">
        <div class="dropdown">
          <a class="dropdown-btn" data-toggle="dropdown" href="javascript:void(0);">
            <i class="fa fa-chevron-down"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#edit" data-toggle="ST-modal" data-target="#popup" ST-type="edit">编辑</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item danger" href="#delete" data-toggle="ST-modal" data-target="#popup" ST-type="delete">删除</a>
          </div>
        </div>
      </div>
      {/if}
    </div>
  {/foreach}
  </div>

  {* Modal *}
  <div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">关闭</span>
          </button>
          <h4 class="modal-title" id="popupLabel">Modal title</h4>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

</div>
