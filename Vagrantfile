# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.

Vagrant.configure("2") do |config|
  # sinkronisasi folder
  config.vm.synced_folder ".", "/vagrant"
  # MySQL Cluster dengan 3 node
  (1..3).each do |i|
    config.vm.define "mysqlnode#{i}" do |node|
      node.vm.hostname = "mysqlnode#{i}"
      node.vm.box = "bento/ubuntu-16.04"
      node.vm.network "private_network", ip: "192.168.33.1#{i}"

      # Opsional. Edit sesuai dengan nama network adapter di komputer
      node.vm.network "public_network", bridge: "enp2s0"
      node.vm.provider "virtualbox" do |vb|
        vb.name = "mysqlnode#{i}"
        vb.gui = false
        vb.memory = "512"
      end
  
      node.vm.provision "shell", path: "mysql/deployMySQL1#{i}.sh", privileged: false
    end
  end

  config.vm.define "proxysql" do |proxy|
    proxy.vm.hostname = "proxysql"
    proxy.vm.box = "bento/ubuntu-16.04"
    proxy.vm.network "private_network", ip: "192.168.33.10"
    proxy.vm.network "public_network",  bridge: "enp2s0"
    
    proxy.vm.provider "virtualbox" do |vb|
      vb.name = "proxysql"
      vb.gui = false
      vb.memory = "512"
    end

    proxy.vm.provision "shell", path: "mysql/deployProxySQL.sh", privileged: false
  end

  # redis cluster -> fail
  # (1..3).each do |i|
  #   config.vm.define "redis#{i}" do |node|
  #     node.vm.hostname = "redis#{i}"
  #     node.vm.box = "bento/ubuntu-16.04"
  #     node.vm.network "private_network", ip: "192.168.33.2#{i}"

  #     # Opsional. Edit sesuai dengan nama network adapter di komputer
  #     node.vm.network "public_network", bridge: "enp2s0"
  #     node.vm.provider "virtualbox" do |vb|
  #       vb.name = "redis#{i}"
  #       vb.gui = false
  #       vb.memory = "512"
  #     end
  
  #     node.vm.provision "shell", path: "redis/provision.sh", privileged: false
  #     # node.vm.provision "shell", path: "redis/connect#{i}.sh", privileged: false
  #   end
  # end
end