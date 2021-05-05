data "aws_ami" "ubuntu" {
  most_recent = true
  owners      = ["099720109477"] # Canonical


  filter {
    name   = "name"
    values = ["ubuntu/images/hvm-ssd/ubuntu-focal-20.04-amd64-server-*"]
  }

  filter {
    name   = "virtualization-type"
    values = ["hvm"]
  }
}

resource "aws_instance" "cyberhawk" {
  ami             = data.aws_ami.ubuntu.id
  instance_type   = "t3.micro"
  security_groups = [aws_security_group.allow_http_ssh.name]
  key_name        = "kamil"

  user_data = "${file("bootstrap.sh")}"

  # # Copies all files and folders in apps/app1 to D:/IIS/webapp1
  # provisioner "file" {
  #   source      = "cyberhawk-app/"
  #   destination = "/home/ubuntu"
  # }

  tags = {
    Name = "Cyberhawk Turbine Inspector"
  }
}
