<?php
class Enumeration extends AppModel
{
  var $name = 'Enumeration';
  
#  acts_as_list :scope => 'opt = \'#{opt}\''
#
#  before_destroy :check_integrity
#  
#  validates_presence_of :opt, :name
#  validates_uniqueness_of :name, :scope => [:opt]
#  validates_length_of :name, :maximum => 30
#
  var  $OPTIONS = array(
    "IPRI" => array('label' => 'Issue priorities', 'model' => 'Issue', 'foreign_key' => 'priority_id'),
    "DCAT" => array('label' => 'Document categories', 'model' => 'Document', 'foreign_key' => 'category_id'),
    "ACTI" => array('label' => 'Activities (time tracking)', 'model' => 'TimeEntry', 'foreign_key' => 'activity_id')
  );
#  
#  def self.get_values(option)
#    find(:all, :conditions => {:opt => option}, :order => 'position')
#  end
  function get_values($option, $order = 'ASC') {
    return $this->find('all', array('conditions'=>array('opt'=>$option), 'order'=>"position $order"));
  }
#  
  function default_value($option) {
    return $this->find('first', array('conditions'=>array('opt'=>$option, 'is_default'=>true), 'order'=>'position'));
  }
#
#  def option_name
#    OPTIONS[self.opt][:label]
#  end
#
#  def before_save
#    if is_default? && is_default_changed?
#      Enumeration.update_all("is_default = #{connection.quoted_false}", {:opt => opt})
#    end
#  end
#  
#  def objects_count
#    OPTIONS[self.opt][:model].count(:conditions => "#{OPTIONS[self.opt][:foreign_key]} = #{id}")
#  end
#  
#  def in_use?
#    self.objects_count != 0
#  end
#  
#  alias :destroy_without_reassign :destroy
#  
#  # Destroy the enumeration
#  # If a enumeration is specified, objects are reassigned
#  def destroy(reassign_to = nil)
#    if reassign_to && reassign_to.is_a?(Enumeration)
#      OPTIONS[self.opt][:model].update_all("#{OPTIONS[self.opt][:foreign_key]} = #{reassign_to.id}", "#{OPTIONS[self.opt][:foreign_key]} = #{id}")
#    end
#    destroy_without_reassign
#  end
#  
#  def <=>(enumeration)
#    position <=> enumeration.position
#  end
#  
#  def to_s; name end
#  
#private
#  def check_integrity
#    raise "Can't delete enumeration" if self.in_use?
#  end
#end
}
