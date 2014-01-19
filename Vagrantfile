Vagrant.configure("2") do |config|
    config.vm.box = "precise64-orig"
    config.vm.box_url = "http://files.vagrantup.com/precise64.box"

    config.vm.hostname = "localhost"

    config.vm.network :forwarded_port, guest: 80, host: 11080
    config.vm.network :forwarded_port, guest: 8080, host: 11090

    config.vm.network :private_network, ip: "192.168.60.101"

    config.ssh.forward_agent = true

    config.vm.provider :virtualbox do |v, override|
	    override.vm.box_url = "http://files.vagrantup.com/precise64.box"
	
        v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
        v.customize ["modifyvm", :id, "--memory", 512]
        v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
        v.customize ["modifyvm", :id, "--natdnsproxy1", "on"]
    end

    config.vm.provider :vmware_workstation do |v, override|
        override.vm.box_url = "http://files.vagrantup.com/precise64_vmware.box"

        v.vmx["memsize"] = "256"
    end
    
    config.vm.synced_folder ".", "/vagrant", nfs: true

    config.vm.provision :shell, :inline => "if [[ ! -f /apt-get-run ]]; then sudo apt-get update && sudo touch /apt-get-run; fi"

    config.vm.provision :puppet do |puppet|
        puppet.manifests_path = ".puppet/manifests"
        puppet.module_path = ".puppet/modules"
        puppet.options = ['--verbose']
    end

end
