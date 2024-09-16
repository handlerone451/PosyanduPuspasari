{pkgs}: {
  channel = "stable-23.11";
  packages = [
    pkgs.nodejs_20
    pkgs.php83
  ];
  idx.extensions = [
    "svelte.svelte-vscode"
    "vue.volar"
  ];

services.mysql = {
  enable = true;
  package = pkgs.mariadb;
};

  idx.previews = {
    previews = {
      web = {
        command = [
          "npm"
          "run"
          "dev"
          "--"
          "--port"
          "$PORT"
          "--host"
          "0.0.0.0"
        ];
        manager = "web";
      };
    };
  };
}