<?phpclass CustomerViewModel extends ViewModel {    protected $viewFields;    public function _initialize(){        $main_must_field = array('customer_id','owner_role_id','is_locked','creator_role_id','contacts_id','delete_role_id','create_time','delete_time','update_time','get_time','is_deleted');        $main_list = array_unique(array_merge(M('Fields')->where(array('model'=>'customer','is_main'=>1))->getField('field', true),$main_must_field));        $data_list = M('Fields')->where(array('model'=>'customer','is_main'=>0))->getField('field', true);        $data_list['_on'] = 'customer.customer_id = customer_data.customer_id';        $data_list['_type'] = "LEFT";//        //置顶逻辑//        $data_top = array('set_top','top_time');////        $data_top['_on'] = "customer.customer_id = top.module_id and top.module = 'customer' and top.create_role_id = ".session('role_id');//        $data_top['_type'] = "LEFT";        //首要联系人（姓名、电话）//        $data_r_contacts_customer = ['contacts_id','customer_id'];        $data_r_contacts_customer['_on'] ="customer.customer_id = r_contacts_customer.customer_id";        $data_r_contacts_customer['_type'] = 'LEFT';        $data_contacts = array('name'=>'contacts_name', 'telephone'=>'contacts_telephone', 'saltname'=>'contacts_saltname');        $data_contacts['_on'] = "contacts.contacts_id = r_contacts_customer.contacts_id";        $this->viewFields = array('customer'=>$main_list,'customer_data'=>$data_list,'r_contacts_customer'=>$data_r_contacts_customer,'contacts'=>$data_contacts);//,'top'=>$data_top 'r_contacts_customer'=>$data_r_contacts_customer,    }}