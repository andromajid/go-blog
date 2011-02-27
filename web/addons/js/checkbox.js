function check_all(form_name, input_name, start)
{
  master = document.getElementById(input_name);
  form_obj = document.getElementById(form_name);

  i = start;
  input_element = input_name + "["+ i +"]";
  input_obj = document.getElementById(input_element);
  while(input_obj != null)
  {
    input_obj = document.getElementById(input_element);
    input_obj.checked = master.checked;

    i = i + 1;
    input_element = input_name + "["+ i +"]";
    input_obj = document.getElementById(input_element);
  }
}