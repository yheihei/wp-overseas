<?php
if(is_home()) {
  if(is_recommend_slider_area_enable()) {
    get_template_part('tmp/entry-card-recommend-slider');
  }
}