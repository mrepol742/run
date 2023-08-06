{ pkgs }: {
	deps = [
		pkgs.python39Full
  pkgs.nodejs-16_x
  pkgs.adoptopenjdk-openj9-bin-8
  pkgs.jre_minimal
  pkgs.php82
  pkgs.nodejs-18_x
    pkgs.nodePackages.typescript-language-server
    pkgs.yarn
    pkgs.replitPackages.jest
	];
}